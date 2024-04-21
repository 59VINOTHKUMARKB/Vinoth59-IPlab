<?php

class OnlineCourse
{
    private $title;
    private $instructor;
    private $duration;
    private $price;
    private $enrolledStudents = [];
    private $courseMaterials = [];
    private $studentProgress = [];

    public function __construct($name,$title, $instructor, $duration, $price)
    {
        $this->name=$name;
        $this->title = $title;
        $this->instructor = $instructor;
        $this->duration = $duration;
        $this->price = $price;
    }

    public function enrollStudent($studentName)
    {
        $this->enrolledStudents[] = $studentName;
        $this->studentProgress[$studentName] = 0;
    }

    public function addCourseMaterial($material)
    {
        $this->courseMaterials[] = $material;
    }

    public function updateStudentProgress($studentName, $progress)
    {
        if (!isset($this->studentProgress[$studentName])) {
            return;
        }
        $this->studentProgress[$studentName] = $progress;
    }

    public function displayCourseDetails()
    {
        echo "Name of student: $this->name\n"."<br>";
        echo "Course Title: $this->title\n"."<br>";
        echo "Instructor: $this->instructor\n"."<br>";
        echo "Duration: $this->duration\n"."<br>";
        echo "Price: $this->price\n"."<br>";
    }

    public function displayEnrolledStudents()
    {
        echo "Enrolled Students:\n";
        foreach ($this->enrolledStudents as $student) {
            echo "$student\n";
        }
    }

    public function displayCourseMaterials()
    {
        echo "Course Materials:\n"."<br>";
        foreach ($this->courseMaterials as $material) {
            echo "$material\n"."<br>";
        }
    }

    public function displayStudentProgress()
    {
        echo "Student Progress:\n";
        foreach ($this->studentProgress as $student => $progress) {
            echo "$student: $progress%\n";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $instructor = $_POST['instructor'];
    $duration = $_POST['duration'];
    $price = $_POST['price'];
    $name=$_POST['student'];

    $course = new OnlineCourse($name,$title, $instructor, $duration, $price);

    echo "<h2>Course Details</h2>";
    $course->displayCourseDetails();
    echo "<br>";

    $course->enrollStudent($name);

    echo "<h2>Enrolled Students</h2>";
    $course->displayEnrolledStudents();
    
    echo "<br>";
    
    $course->addCourseMaterial("Lesson 1: Introduction to PHP");
    $course->addCourseMaterial("Lesson 2: Variables and Data Types");

    echo "<h2>Course Materials</h2>";
    $course->displayCourseMaterials();

    $course->updateStudentProgress($name, 50);
    
    echo "<h2>Student Progress</h2>";
    $course->displayStudentProgress();
    
    echo "<br>";
    
    echo 'Thank You For Registering!';
} else {
    echo "Invalid request method!";
}

?>
