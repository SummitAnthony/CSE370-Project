<?php
include 'connection.php';

session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: index.php");
    exit();
}

$userEmail = $_SESSION['user_email'];

if (isset($_POST['addCourse1'])) {
    $selectedCourse1 = $_POST['selectedCourse1'];
    $selectedCourses = getSelectedCourses($userEmail);
    
    if (!in_array($selectedCourse1, $selectedCourses)) {
        updateSelectedCourse($userEmail, 'selected_course_1', $selectedCourse1);
    }
    
    header("Location: courses.php");
    exit();
} elseif (isset($_POST['addCourse2'])) {
    $selectedCourse2 = $_POST['selectedCourse2'];
    $selectedCourses = getSelectedCourses($userEmail);

    if (!in_array($selectedCourse2, $selectedCourses)) {
        updateSelectedCourse($userEmail, 'selected_course_2', $selectedCourse2);
    }

    header("Location: courses.php");
    exit();
} elseif (isset($_POST['addCourse3'])) {
    $selectedCourse3 = $_POST['selectedCourse3'];
    $selectedCourses = getSelectedCourses($userEmail);

    if (!in_array($selectedCourse3, $selectedCourses)) {
        updateSelectedCourse($userEmail, 'selected_course_3', $selectedCourse3);
    }

    header("Location: courses.php");
    exit();
} elseif (isset($_POST['submit'])) {
    $selectedCourse1 = $_POST['selectedCourse1'];
    $selectedCourse2 = $_POST['selectedCourse2'];
    $selectedCourse3 = $_POST['selectedCourse3'];
    $selectedCourses = getSelectedCourses($userEmail);

    if (!in_array($selectedCourse1, $selectedCourses) &&
        !in_array($selectedCourse2, $selectedCourses) &&
        !in_array($selectedCourse3, $selectedCourses)) {
        updateSelectedCourses($userEmail, $selectedCourse1, $selectedCourse2, $selectedCourse3);
    }

    header("Location: h.php");
    exit();
}

echo "Error: Unexpected form submission.";
exit();

function getSelectedCourses($userEmail) {
    global $conn;

    $sql = "SELECT selected_course_1, selected_course_2, selected_course_3 FROM students_courses WHERE email = '$userEmail'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return array_filter($row); // Remove any null values
    }

    return [];
}

function updateSelectedCourse($userEmail, $column, $course) {
    global $conn;

    $sql = "UPDATE students_courses 
            SET $column = '$course' 
            WHERE email = '$userEmail'";

    if ($conn->query($sql) === TRUE) {
        echo "Course '$course' selected successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateSelectedCourses($userEmail, $course1, $course2, $course3) {
    global $conn;

    $sql = "UPDATE students_courses 
            SET selected_course_1 = '$course1', 
                selected_course_2 = '$course2', 
                selected_course_3 = '$course3' 
            WHERE email = '$userEmail'";

    if ($conn->query($sql) === TRUE) {
        echo "Courses selected successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
