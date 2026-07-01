<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Quiz;
use App\Models\Mcq;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        $validation = $request->validate([
            "name" => "required",
            "password" => "required",
        ]);

        $admin = Admin::where([
            ['name', '=', $request->name],
            ['password', '=', $request->password],
        ])->first();

        if (!$admin) {
            $validation = $request->validate([
                "user" => "required",
            ], [
                "user.required" => "User does not exists!"
            ]);
        }

        Session::put("admin", $admin);
        return redirect('dashboard');
    }


    function dashboard()
    {
        $admin = Session::get('admin');
        if ($admin) {
            $totalCategories = Category::count();
            $totalQuizzes = Quiz::count();
            $totalUsers = Admin::count(); // or User::count() if you have a users table

            return view('admin', [
                "name" => $admin->name,
                "totalCategories" => $totalCategories,
                "totalQuizzes" => $totalQuizzes,
                "totalUsers" => $totalUsers,
            ]);
        } else {
            return redirect('admin-login');
        }

        
    }


    function categories()
    {
        $categories = Category::get();
        $admin = Session::get('admin');
        if ($admin) {
            return view('categories', ["name" => $admin->name, "categories" => $categories]);
        } else {
            return redirect('admin-login');
        }
    }

    function logout()
    {
        Session::forget('admin');

        return redirect('admin-login');

    }

    public function addCategory(Request $request)
    {
        $validation = $request->validate([
            "category" => "required | min:3 | unique:categories,name"
        ]);
        $admin = Session::get('admin');

        $category = new Category();

        $category->name = $request->category;
        $category->creator = $admin->name;

        if ($category->save()) {
            Session::flash('category', 'Succsess: Category ' . $request->category . " Added");
        }

        return redirect('admin-categories');
    }

    public function deleteCategory($id)
    {
        // Get all quizzes of this category
        $quizzes = Quiz::where('category_id', $id)->get();

        // Delete MCQs of every quiz
        foreach ($quizzes as $quiz) {
            Mcq::where('quiz_id', $quiz->id)->delete();
        }

        // Delete all quizzes of this category
        Quiz::where('category_id', $id)->delete();

        // Finally delete the category
        $isDeleted = Category::find($id)->delete();

        if ($isDeleted) {
            Session::flash('category', 'Success: Category deleted successfully.');
        }

        return redirect('admin-categories');
    }

    function addQuiz()
    {

        $admin = Session::get('admin');
        $categories = Category::get();
        $totalMCQs = 0;
        if ($admin) {
            $quizName = request('quiz');
            $category_id = request('category_id');

            if ($quizName && $category_id && !Session::has('quizDetails')) {
                $quiz = new Quiz();
                $quiz->name = $quizName;
                $quiz->category_id = $category_id;
                if ($quiz->save()) {
                    Session::put('quizDetails', $quiz);
                }

            } else {
                $quiz = Session::get('quizDetails');
                $totalMCQs = $quiz
                    ? Mcq::where('quiz_id', $quiz->id)->count()
                    : 0;

            }

            return view('add-quiz', ["name" => $admin->name, "categories" => $categories, "totalMCQs" => $totalMCQs]);
        } else {
            return redirect('admin-login');
        }
    }

    public function addMCQs(Request $request)
    {
        $request->validate([
            "question" => "required|min:5",
            "a" => "required",
            "b" => "required",
            "c" => "required",
            "d" => "required",
            "correct_ans" => "required",
            "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048"
        ]);

        $quiz = Session::get('quizDetails');
        $admin = Session::get('admin');

        $mcq = new Mcq();

        $mcq->question = $request->question;
        $mcq->a = $request->a;
        $mcq->b = $request->b;
        $mcq->c = $request->c;
        $mcq->d = $request->d;
        $mcq->correct_ans = $request->correct_ans;
        $mcq->admin_id = $admin->id;
        $mcq->quiz_id = $quiz->id;
        $mcq->category_id = $quiz->category_id;

        // Upload image only if selected
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('questions', 'public');
            $mcq->image = $path;
        }

        if ($mcq->save()) {

            if ($request->submit == "add-more") {

                return redirect()->back();

            } else {

                Session::forget('quizDetails');

                return redirect('/admin-categories')
                    ->with('success', 'Quiz and MCQs added successfully.');

            }
        }

        return back()->with('error', 'Something went wrong.');
    }

    function endQuiz()
    {
        Session::forget('quizDetails');
        return redirect("/admin-categories");
    }


    public function showQuiz($id)
    {
        $admin = Session::get('admin');

        if ($admin) {

            $quiz = Quiz::find($id);

            $mcqs = Mcq::where('quiz_id', $id)->get();

            return view('show-quiz', [
                "name" => $admin->name,
                "mcqs" => $mcqs,
                "quizName" => $quiz->name
            ]);
        }

        return redirect('admin-login');
    }

    function quizList($id, $category)
    {
        $admin = Session::get('admin');
        if ($admin) {
            $quizData = Quiz::where('category_id', $id)->get();
            return view('quiz-list', ["name" => $admin->name, "quizData" => $quizData, 'category' => $category]);
        } else {
            return redirect('admin-login');
        }
    }


}