<?php


use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\ReportCardController;
use App\Http\Controllers\AdminProfileSettingController;
use App\Http\Controllers\AdviserProfileSettingController;
use App\Http\Controllers\SubjectTeacherProfileSettingController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Adviser\DashboardController;


use Illuminate\Support\Facades\Route;
use Dompdf\Dompdf;




//To preven the arrow back.....................
Route::group(['middleware' => 'prevent-back-history'],function(){

    Route::get('/', function () {
        return view('welcome');
    });


//Reset  Password
Route::get('forgotpassword', [ResetPasswordController::class, 'index']);
Route::post('/forgotpassword/contactnumber', [ResetPasswordController::class, 'resetPass'])->name('auth.passwords.resetpassword');
Route::post('/forgotpassword/contactnumber/reset-pass', [ResetPasswordController::class, 'resetpassword'])->name('reset-password');



Auth::routes();
Route::get('/adviser', [App\Http\Controllers\Adviser\DashboardController::class, 'index'])->middleware('role:adviser');
Route::get('/admin-dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->middleware('role:admin');
Route::get('/non_advisory/{teacher}', [App\Http\Controllers\NonAdvisory\DashboardController::class, 'index'])->middleware('role:none-adviser');

//print
Route::get('/prnpriview');

//...............................................................ROUTES HERE IS INTENDED FOR ADMIN ONLY..............................................................................

//Admin User
Route::get('/admin-user', [AdminUserController::class, 'adminUser']);
// Route::get('/admin-user/{admin}', [AdminUserController::class, 'adminUser']);
Route::post('/admin-user', [AdminUserController::class, 'addAdmin'])->name('addAdmin');
Route::get('/admin-information/{admin}', [AdminUserController::class, 'view'])->name('addView');
Route::patch('/admin-user/{admin}', [AdminUserController::class, 'resetPassword'])->name('resetPassword');


//For admin- teacher side...........................................................
Route::view('register','components.admin.teachers.register',['nav' => 'teachers']);
Route::view('junior-teachers','components.admin.teachers.junior-teachers',['nav' => 'teachers']);
Route::view('teacher-information','components.admin.teachers.teacher-information',['nav' => 'teachers']);



//For admin-files
Route::get('/adminfile', [FilesController::class, 'listFiles'])->name('file.listFiles');

//THIS IS FOR MY FILES........................................................
Route::get('/admin/myfiles', [FilesController::class, 'viewFiles'])->name('myfiles');
Route::get('/myfiles', [FilesController::class, 'index']);
Route::post('/myfiles', [FilesController::class, 'store'])->name('myfiles.store');
Route::get('/teachers/file', [FilesController::class, 'show'])->name('myfiles.show');
Route::get('/teachers/{file}/view', [FilesController::class,'view']);
Route::get('/teachers/{file}/delete', [FilesController::class,'delete'])->name('myfiles.delete');
Route::get('/teachers/{file}/viewTeacherFile/{id}', [FilesController::class,'viewAdminTeacherFile']);


//For Admission....................................................................
Route::get('/admission',[AdmissionController::class,'show']);
// Route::get('/getSection/{section}',[AdmissionController::class, 'getSection'])->name('getSection');


//FOR SUBJECTS
Route::get('/subjects',[SubjectController::class,'show'])->name('subjects.show');
Route::post('/subjects',[SubjectController::class,'store']);
Route::get('/subjects/delete/{id}',[SubjectController::class,'delete']);


//FOR STUDENTS
Route::get('/student-list/schoolyear',[StudentController::class,'show']);
Route::get('/student-list/{schoolyear}',[StudentController::class,'showStudentsLists'])->name('show.students');
Route::post('/junior-high/student-details/{LRN}/{schoolyear}', [StudentController::class,'updateStudent'])->name('update.studentDetails');





//Junior High sections....
Route::get('/junior-high/student-details/{id}/{LRN}/{schoolyear}',[SectionsController::class, 'studentsectiondetails'])->name('view.sectionDetail');
Route::get('/junior-high/student-details/{id}/{LRN}/{schoolyear}',[SectionsController::class, 'studentDetails'])->name('student.details');
Route::get('/junior-high/{id}/%specific%-student-details//{LRN}/{schoolyear}',[SectionsController::class, 'irregularstudentDetails'])->name('irregularstudent.details');
Route::patch('/junior-high/student-details/{LRN}', [AdmissionController::class, 'updateStudent'])->name('update.student');
Route::get('/school-year',[SectionsController::class, 'schoolYear']);
Route::get('/junior-high/reportcard/{id}/{LRN}/{teacher}',[SectionsController::class, 'reportcard'])->name('student.reportcard');
Route::get('/junior-high/report-card/{LRN}/{schoolyear}/{id}',[SectionsController::class, 'adminreportcard'])->name('report.card');
Route::get('/junior-high/{id}/{LRN}/{sectionid}/{schoolyear}',[SectionsController::class, 'irreportcard'])->name('irregularstudent.reportcard');

Route::get('/junior-high/{schoolyear}',[SectionsController::class, 'show'])->name('show.sections');
Route::post('/junior-high/{schoolyear}',[SectionsController::class, 'create'])->name('create.section');
Route::put('/junior-high/update/{id}',[SectionsController::class, 'update']);
Route::get('/teachers/{id}/student-list/{schoolyear}', [SectionsController:: class, 'index'])->name('student.list');
Route::get('/teachers/{section}/schedule/{schoolyear}', [SectionsController:: class, 'schedule'])->name('section.schedule');
Route::get('/school-year',[SectionsController::class, 'schoolYear']);
Route::post('/school-year',[SectionsController::class, 'add']);
Route::get('/components.admin.section.reportcard', [SectionsController::class, 'printReportCard']);
Route::get('/components.admin.section.schedule_convert_pdf', [SectionsController::class, 'pdfGeneration']);





//profile
Route::get('/admin-dashboard/profile',[AdminProfileSettingController::class, 'adminProfile'])->name('components.admin.profile');
Route::post('/admin-dashboard/profile/changepass',[AdminProfileSettingController::class, 'changepass'])->name('components.admin.profile.change');


//Create Teachers
Route::get('/teachers/schoolyear',[TeachersController::class,'index'])->name('teachers.display');
Route::get('/teachers/{teacher}/teacher-information',[TeachersController::class,'show']);
Route::get('/teachers/create',[TeachersController::class,'create'])->name('teachers.create');
Route::post('/teachers/create/{schoolyear}',[TeachersController::class,'store'])->name('teacher.store');
// Route::patch('/teachers/{teactSection}/{section}',[TeachersController::class, 'getSection'])->name('getSection');
Route::patch('/teachers/{teacher}/teacher-information',[TeachersController::class,'update'])->name('update.teacher');
Route::get('teacher-information/changePass',[TeachersController::class, 'changePass'])->name('components.admin.teachers.teacher-information.changePass');
Route::get('/teachers/{schoolyear}/list',[TeachersController::class, 'showTeacherLists'])->name('show.teachers');
// Route::patch('/teachers/{teacher}/resetpassword', [TeachersController::class, 'resetPassword'])->name('reset.teacherPassword');
Route::get('/teachers/{teacher}/resetpassword', [TeachersController::class, 'resetPassword']);

//Display the files of teachers.......................
Route::get('/teacher-file/{id}/{schoolyear}',[TeachersController::class,'displayFiles']);
Route::get('/teachers/{file}/viewteacherFile', [FilesController::class,'viewteacherFile']);

//teacher Schedule final
Route::get('/schedules/{id}/{name}/{advisory}', [ScheduleController::class,'viewSched']);

//Schedule
Route::get('/schedules/{id}/{name}/{schoolyear}', [ScheduleController::class,'viewSched'])->name('schedule.viewSched');
Route::post('s/chedules/', [ScheduleController::class,'store'])->name('schedule.store');
Route::get('/schedules/{teacherID}/{name}/{id}', [ScheduleController::class,'destroy'])->name('schedule.delete');
//final
Route::get('/teacher/schedules/{id}/{gradeLevel}/{subject}/{schoolyear}', [ScheduleController::class,'edit'])->name('schedule.edit');
Route::put('/teacher-schedule/{schedID}/{id}', [ScheduleController::class,'update'])->name('schedule.update');


//ADMISSION
Route::get('/getSection/{section}/{schoolyear}',[AdmissionController::class, 'getSection'])->name('getSection');
Route::post('/admission', [AdmissionController::class,'addStudent'])->name('admission.store');

Route::get('/junior-high/student-details/edit/{id}/{LRN}/{schoolyear}', [AdmissionController::class,'editAdminStudent'])->name('edit.adminStudent');
Route::patch('/junior-high/student-details/update/{id}/{schoolyear}', [AdmissionController::class,'update'])->name('update.adminStudent');



//...............................................ROUTES HERE IS INTENDED FOR TEACHER/ADVISER ONLY..............................................................................

//Teacher Dashboard..........
Route::get('/adviser_dashboard/{schoolyear}', [DashboardController::class, 'show'])->name('adviser.dashboard');

Route::get('/adviser-studentlist/edit/{LRN}/{schoolyear}', [AdmissionController::class,'edit'])->name('edit.adviserStudent');
Route::patch('/adviser-studentlist/update/{id}/{schoolyear}', [AdmissionController::class,'update'])->name('update.adviserStudent');


//teacher admission
Route::get('/getadviserSection/{section}/{schoolyear}',[AdmissionController::class, 'getadviserSection'])->name('getadviserSection');
Route::get('/adviser-admission/{schoolyear}',[AdmissionController::class,'showTeacherAdmission']);
Route::post('/adviser-admission/{schoolyear}', [AdmissionController::class,'addteacherStudent'])->name('adviser-admission.store');


//adviser students tab
Route::get('/adviser-studentlist/{schoolyear}',[StudentController::class, 'showStudents']);
Route::get('/adviser-studentlist/{id}/{LRN}/{schoolyear}',[StudentController::class, 'showStudentsDetails'])->name('adviserStudent.details');
//adviser schedule
Route::get('/adviser-schedule/{schoolyear}',[StudentController::class, 'adviserSched']);




//Profile of adviser ..............................................
Route::get('/adviser/profile',[AdviserProfileSettingController::class, 'adviserProfile'])->name('components.adviser.profile');
Route::post('/adviser_dashboard/profile/changepass',[AdviserProfileSettingController::class, 'changepass'])->name('components.adviser.profile.change');


//Adviser-Subjects...............
Route::get('/adviser-subjects/{schoolyear}',[StudentController::class, 'showSubjects']);
Route::get('/adviser-subjects/{gradelevel}/{section}/{subject}/{schoolyear}',[StudentController::class, 'showStudentList'])->name('subject.list');
Route::get('/adviser-subjects/{studId}/{LRN}/{gradelevel}/{section}/{subject}/{schoolyear}',[StudentController::class, 'addGrade'])->name('add.grade');
Route::post('/adviser-subjects/{stud}/{LRN}/{gradelevel}/{section}/{subject}/{schoolyear}/{id}', [StudentController::class,'saveGrade'])->name('save.grade');

//Teacher Files...................
Route::get('/teacher-files/{schoolyear}', [FilesController::class, 'adviserIndex'])->name('teacher-files');
Route::post('/teacher-files/{schoolyear}', [FilesController::class, 'storeAdviserFiles'])->name('teacher-files.storeAdviserFiles');
Route::get('/teacher-files/file', [FilesController::class, 'showFiles'])->name('teacher-files.showFiles');
Route::get('/teacher-files/{file}/viewFile', [FilesController::class,'viewFile']);
Route::get('/teacher-files/{id}/deletefile/{schoolyear}', [FilesController::class,'deleteFile'])->name('file.delete');

//Report Card
Route::get('report-card',[ReportCardController::class, 'view']);
Route::get('student/report-card',[ReportCardController::class, 'shsReportCard']);
Route::get('/jr-report-card',[ReportCardController::class, 'generatePDF']);


//for students
Route::get('/student-list', [StudentController::class, 'index'])->name('student-list');

//..............................................ROUTES HERE IS INTENDED FOR NONE-ADVISORY/SUBJECT TEACHER ONLY..............................................................................
Route::get('/none-advisory/{schoolyear}', [StudentController::class, 'showNonadvisorySub'])->name('none-advisory.subjects');
Route::get('/none-adviser-subjects/{gradelevel}/{section}/{subject}/{schoolyear}',[StudentController::class, 'noneadviserStudentList'])->name('noneadviserStudent.list');
Route::get('/none-adviser-subjects/{studentid}/{LRN}/{gradelevel}/{section}/{subject}/{schoolyear}',[StudentController::class, 'nonadviseraddGrade'])->name('nonadviseradd.grade');

//CLARIFY NI JOY
Route::post('/none-adviser-subjects/{nonstudentid}/{LRN}/{gradelevel}/{section}/{subject}/{schoolyear}/{id}', [StudentController::class,'nonadvisersaveGrade'])->name('noneadvisersave.grade');


//for none-adviser schedules
Route::get('/none-advisory-schedule/{schoolyear}', [StudentController::class, 'nonadviserSched']);



//for files
Route::get('/files/{schoolyear}', [FilesController::class, 'subjectTeacherIndex']);



//..........FOR FILES........................
Route::get('/subject_teacher_files', [FilesController::class, 'subjectTeacherIndex'])->name('subject_teacher_files');
Route::post('/subject_teacher_files', [FilesController::class, 'storeSubjectTeacherFiles'])->name('subject_teacher_files.storeSubjectTeacherFiles');
Route::post('/files/none-advisory', [FilesController::class, 'storeSubTeacher'])->name('files.storeSubTeacher');
Route::get('/files', [FilesController::class, 'showSubTeacherFiles'])->name('files.showSubTeacherFiles');
Route::get('/files/{file}/viewDocument', [FilesController::class,'viewDocument']);
Route::get('/files/{file}/deleteDocument', [FilesController::class,'deleteDocument'])->name('files.deleteDocument');


//Profile of Subject Teacher...................................................
Route::get('/none-advisory/profile/{teacher}',[SubjectTeacherProfileSettingController::class, 'subjectTeacherProfile']);
Route::post('/none-advisory/profile/changepass',[SubjectTeacherProfileSettingController::class, 'changepass'])->name('components.none-advisory.profile.change');

}); //Prevent back history
