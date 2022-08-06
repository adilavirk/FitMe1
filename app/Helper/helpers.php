<?php


use App\Models\Category;
use App\Models\Course;


function getAllCourses(){

    $courses = Course::get();

    return $courses;
}
function getAllCategories(){

    $categories = Category::get();

    return $categories;
}

?>