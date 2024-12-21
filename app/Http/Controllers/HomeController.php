<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('front.index');
    }
    public function exchange_students(){
        return view('front.exchange_students.exchange_students');
    }
    public function students_profiles(){
        return view('front.exchange_students.students_profiles');
    }
    public function faculty_staff_exchange(){
        return view('front.faculty_staff_exchange.faculty_staff_exchange');
    }
    public function internships(){
        return view('front.internships.internships');
    }
    public function workshop(){
        return view('front.workshops.workshop');
    }
    public function research_projects(){
        return view('front.research_projects.research_projects');
    }
    public function program(){
        return view('front.programs.program');
    }
    public function academic_programs(){
        return view('front.academic_programs.academic_programs');
    }
    public function cultural_programs(){
        return view('front.cultural_programs.cultural_programs');
    }
    public function achievements(){
        return view('front.achievements.achievements');
    }
    public function partners(){
        return view('front.partners.partners');
    }
    public function login(){
        return view('front.login.login');
    }
    public function about(){
        return view('front.about');
    }
    public function news(){
        return view('front.news.news');
    }
}
