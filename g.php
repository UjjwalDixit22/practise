<?php
session_start();

// Initialize course data
$courses = [
    1 => ["name" => "Math 101", "available" => 5],
    2 => ["name" => "Physics 101", "available" => 3],
    3 => ["name" => "Chemistry 101", "available" => 2],
    4 => ["name" => "Biology 101", "available" => 4],
];

// Initialize session data for enrolled courses
if (!isset($_SESSION['enrolled_courses'])) {
    $_SESSION['enrolled_courses'] = [];
}

// Handle course enrollment
if (isset($_POST['enroll'])) {
    $course_id = (int)$_POST['course_id'];
    if (!in_array($course_id, $_SESSION['enrolled_courses']) && $courses[$course_id]['available'] > 0) {
        $_SESSION['enrolled_courses'][] = $course_id;
        $courses[$course_id]['available']--;
        echo "Enrolled in course: " . $courses[$course_id]['name'] . "<br>";
    } else {
        echo "Cannot enroll in course: " . $courses[$course_id]['name'] . " (full or already enrolled)<br>";
    }
}

// Handle course drop
if (isset($_POST['drop'])) {
    $course_id = (int)$_POST['course_id'];
    if (($key = array_search($course_id, $_SESSION['enrolled_courses'])) !== false) {
        unset($_SESSION['enrolled_courses'][$key]);
        $courses[$course_id]['available']++;
        echo "Dropped course: " . $courses[$course_id]['name'] . "<br>";
    } else {
        echo "You are not enrolled in this course.<br>";
    }
}

// View enrolled courses
if (isset($_POST['view'])) {
    echo "Enrolled Courses:<br>";
    foreach ($_SESSION['enrolled_courses'] as $enrolled_id) {
        echo $courses[$enrolled_id]['name'] . "<br>";
    }
    if (empty($_SESSION['enrolled_courses'])) {
        echo "You are not enrolled in any courses.<br>";
    }
}

// Check course availability
if (isset($_POST['check'])) {
    echo "Course Availability:<br>";
    foreach ($courses as $id => $course) {
        echo $course['name'] . " - Seats available: " . $course['available'] . "<br>";
    }
}
?>

<!-- HTML Form -->
<form method="POST">
    <h3>Enroll in a Course</h3>
    <select name="course_id">
        <?php foreach ($courses as $id => $course): ?>
            <option value="<?php echo $id; ?>"><?php echo $course['name']; ?></option>
        <?php endforeach; ?>
    </select>
    <button type="submit" name="enroll">Enroll</button>
    <button type="submit" name="drop">Drop Course</button>
    <button type="submit" name="view">View Enrolled Courses</button>
    <button type="submit" name="check">Check Course Availability</button>
</form>
