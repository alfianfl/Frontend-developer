<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgressBarUploadFileController;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;

Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'showLoginForm'])->name('login');
Route::get('/', function () {
    return redirect('/admin/login');
});
Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('loginAction');

Route::group([
    'middleware' => [
        'auth:admin',
    ],
], function () {
    Route::get('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
    Route::get('/index', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

    //--------------------------------------------------------------Admin page------------------------------------------------------------------
    Route::get('/adminPage', [App\Http\Controllers\Admin\AdminController::class, 'page'])->name('adminPage');
    Route::get('/adminPage/createAdmin', [App\Http\Controllers\Admin\AdminController::class, 'create'])->name('adminPage.create');
    Route::post('/adminPage/createAdmin', [App\Http\Controllers\Admin\AdminController::class, 'insert'])->name('adminPage.insert');
    Route::get('/adminPage/editAdmin/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('adminPage.edit');
    Route::post('/adminPage/editAdmin/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update'])->name('adminPage.update');
    Route::delete('/adminPage/deleteAdmin/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete'])->name('adminPage.delete');

    //--------------------------------------------------------------Active User------------------------------------------------------------------
    Route::get('/active-user', [App\Http\Controllers\Admin\ActiveUserController::class, 'index'])->name('activeUser');

    // -----------------------------------------Registered User-----------------------------------------------------------
    Route::get('/registeredConference', [App\Http\Controllers\Admin\RegisteredConferenceController::class, 'index'])->name('registeredConference');
    //--------------------------------------------------------------Conference admin-----------------------------------------------------------
    Route::get('/conference', [App\Http\Controllers\Admin\ConferenceController::class, 'index'])->name('index.conference');
    Route::get('/conference/inputConference', [App\Http\Controllers\Admin\ConferenceController::class, 'ShowConferences']);
    Route::post('/conference/inputConference', [App\Http\Controllers\Admin\ConferenceController::class, 'Add'])->name('add.conferences');
    Route::get('/conference/editConference/{id}', [App\Http\Controllers\Admin\ConferenceController::class, 'Edit']);
    Route::post('/conference/updateConference/{id}', [App\Http\Controllers\Admin\ConferenceController::class, 'Update'])->name('update.conference');
    Route::delete('/conference/deleteConference/{id}', [App\Http\Controllers\Admin\ConferenceController::class, 'delete'])->name('delete.conference');
    //-------------------------------------------------------Keynote speaker admin----------------------------------------------------------------------
    Route::get('/keynote', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'index']);
    Route::get('/keynote/inputKeynoteSpeaker', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'ShowInput']);
    Route::post('/keynote/inputKeynoteSpeaker', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'Add'])->name('add.keynote');
    Route::get('/keynote/editKeynoteSpeaker/{id}', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'Edit'])->name('keynote.edit');
    Route::post('/keynote/UpdateKeynoteSpeaker/{id}', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'Update'])->name('keynote.update');
    Route::delete('/keynote/deleteKeynoteSpeaker/{id}', [App\Http\Controllers\Admin\KeynoteSpeakerController::class, 'delete'])->name('keynote.delete');

    //----------------------------------------------------- PartnerOrganization admin--------------------------------------------------------------------------
    Route::get('/partnerOrganization', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'index'])->name('partnerOrganization');
    Route::get('/partnerOrganization/createPartnerOrganization', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'create'])->name('partnerOrganization.create');
    Route::post('/partnerOrganization/createPartnerOrganization', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'insert'])->name('partnerOrganization.insert');
    Route::get('/partnerOrganization/editPartnerOrganization/{id}', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'edit'])->name('partnerOrganization.edit');
    Route::post('/partnerOrganization/editPartnerOrganization/{id}', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'update'])->name('partnerOrganization.update');
    Route::delete('/partnerOrganization/deletePartnerOrganization/{id}', [App\Http\Controllers\Admin\PartnerOrganizationController::class, 'delete'])->name('partnerOrganization.delete');

    // -------------------------------------------------------committee admin---------------------------------------------------------
    Route::get('/scientificCommittee', [App\Http\Controllers\Admin\ScientificController::class, 'index']);
    Route::get('/scientificCommittee/inputScientificCommittee', [App\Http\Controllers\Admin\ScientificController::class, 'ShowInput']);
    Route::post('/scientificCommittee/inputScientificCommittee', [App\Http\Controllers\Admin\ScientificController::class, 'Add'])->name('add.scientific');
    Route::get('/scientificCommittee/editScientificCommittee/{id}', [App\Http\Controllers\Admin\ScientificController::class, 'Edit'])->name('edit.scientific');
    Route::get('/scientificCommittee/UpdateScientificCommittee/{id}', [App\Http\Controllers\Admin\ScientificController::class, 'Update'])->name('update.scientific');
    Route::delete('/scientificCommittee/deleteScientificCommittee/{id}', [App\Http\Controllers\Admin\ScientificController::class, 'delete'])->name('delete.scientific');
    Route::get('/organizatingCommittee', function () {
        return view('.admin.committee.organizatingCommittee');
    });
    Route::get('/organizatingCommittee/inputOrganizatingCommittee', function () {
        return view('.admin.committee.create.inputOrganizatingCommittee');
    });
    Route::get('/organizatingCommittee/editOrganizatingCommittee', function () {
        return view('.admin.committee.edit.editOrganizatingCommittee');
    });

    // -----------------------------------------Call of paper admin-----------------------------------------------------------
    Route::get('/importantDate', function () {
        return view('.admin.callofpaper.importantDate');
    });
    Route::get('/conferenceFee', function () {
        return view('.admin.callofpaper.conferenceFee');
    });
    Route::get('/publication', function () {
        return view('.admin.callofpaper.publication');
    });
    Route::get('/bankAccount', function () {
        return view('.admin.callofpaper.bankAccount');
    });
    // Create Call of paper admin
    Route::get('/importantDate/inputImportantDate', function () {
        return view('.admin.callofpaper.create.inputImportantDate');
    });
    Route::get('/conferenceFee/inputConferenceFee', function () {
        return view('.admin.callofpaper.create.inputConferenceFee');
    });
    Route::get('/publication/inputPublication', function () {
        return view('.admin.callofpaper.create.inputPublication');
    });
    Route::get('/bankAccount/inputBankAccount', function () {
        return view('.admin.callofpaper.create.inputBankAccount');
    });
    // Edit Call of paper admin
    Route::get('/importantDate/editImportantDate', function () {
        return view('.admin.callofpaper.edit.editImportantDate');
    });
    Route::get('/conferenceFee/editConferenceFee', function () {
        return view('.admin.callofpaper.edit.editConferenceFee');
    });
    Route::get('/publication/editPublication', function () {
        return view('.admin.callofpaper.edit.editPublication');
    });
    Route::get('/bankAccount/editBankAccount', function () {
        return view('.admin.callofpaper.edit.editBankAccount');
    });


    //-----------------------------------------------------------Event Admin-----------------------------------------------
    Route::get('/event', function () {
        return view('.admin.event.event');
    });
    Route::get('/event/inputEvent', function () {
        return view('.admin.event.create.inputEvent');
    });
    Route::get('/event/editEvent', function () {
        return view('.admin.event.edit.editEvent');
    });

    // -------------------------------------------------------Download Admin-----------------------------------------------------------------
    Route::get('/download', [App\Http\Controllers\Admin\DownloadController::class, 'index'])->name('download');
    Route::get('/download/createDownload', [App\Http\Controllers\Admin\DownloadController::class, 'create'])->name('download.create');
    Route::post('/download/createDownload', [App\Http\Controllers\Admin\DownloadController::class, 'insert'])->name('download.insert');
    Route::get('/download/editDownload/{id}', [App\Http\Controllers\Admin\DownloadController::class, 'edit'])->name('download.edit');
    Route::post('/download/editDownload/{id}', [App\Http\Controllers\Admin\DownloadController::class, 'update'])->name('download.update');
    Route::delete('/download/deleteDownload/{id}', [App\Http\Controllers\Admin\DownloadController::class, 'delete'])->name('download.delete');
    Route::post('/download/certificate/{id}', [App\Http\Controllers\Admin\DownloadController::class, 'certificate'])->name('certificate');

    //-------------------------------------------------------Submissions Admin-------------------------------------------------------------------
    Route::get('/proofOfPayment', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'Showpayment']);
    Route::get('/proofOfPayment/editProofOfPayment/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'EditPayment']);
    Route::post('/proofOfPayment/updateProofOfPayment/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'UpdatePayment'])->name('update.payment');

    Route::get('/proofOfMember', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'ShowMember']);
    Route::get('/proofOfMember/editProofOfMember/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'editMember'])->name('edit.member');
    Route::post('/proofOfMember/updateProofOfMember/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'updateMember'])->name('update.member');

    Route::get('/abstract', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'ShowAbstract']);
    Route::get('/abstract/editAbstract/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'editAbstract']);
    Route::post('/abstract/updateAbstract/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'updateAbstract'])->name('update.abstract');

    Route::get('/fullPaper', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'ShowPaper']);
    // edit Submission

    Route::get('/fullPaper/editFullPaper/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'editPaper']);
    Route::post('/fullPaper/updatetFullPaper/{id}', [App\Http\Controllers\Admin\AdminSubmissionController::class, 'updatePaper'])->name('update.paper');
});
