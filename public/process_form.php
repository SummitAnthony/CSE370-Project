<?php
require_once __DIR__ . '/../includes/db.php';

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

    $stmt = $conn->prepare("SELECT selected_course_1, selected_course_2, selected_course_3 FROM students_courses WHERE email = ?");
    $stmt->bind_param('s', $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return array_filter($row); // Remove any null values
    }

    return [];
}

function updateSelectedCourse($userEmail, $column, $course) {
    global $conn;

    // Column name cannot be a bound parameter — restrict it to known columns
    $allowedColumns = ['selected_course_1', 'selected_course_2', 'selected_course_3'];
    if (!in_array($column, $allowedColumns, true)) {
        echo "Error: invalid course column.";
        return;
    }

    $stmt = $conn->prepare("UPDATE students_courses SET $column = ? WHERE email = ?");
    $stmt->bind_param('ss', $course, $userEmail);

    if ($stmt->execute()) {
        echo "Course '" . htmlspecialchars($course) . "' selected successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

function updateSelectedCourses($userEmail, $course1, $course2, $course3) {
    global $conn;

    $stmt = $conn->prepare("UPDATE students_courses
            SET selected_course_1 = ?,
                selected_course_2 = ?,
                selected_course_3 = ?
            WHERE email = ?");
    $stmt->bind_param('ssss', $course1, $course2, $course3, $userEmail);

    if ($stmt->execute()) {
        echo "Courses selected successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
