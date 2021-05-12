<?php
// 把session_start寫在adtpl-header.php
// session_start();
require_once '../db.inc.php';
require_once '../templates/adtpl-header.php';

?>
<div class="bg-light p-3">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal">EVENT</h5>
                    </div>
                    <div class="card-body " >
                        <h2 class="mt-5 mb-4 card-title pricing-card-title " >活動管理 </h2>
                        <p class="mb-2">請按下方按鈕<br>進入管理頁面</p>
                        <p class="mb-5">Please press the button below to enter the back end system page.</p>
                        <input type="button" class="btn btn-lg btn-block btn-info " value="Enter" onclick="location.href='../event/index.php'">
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal">ARTICLE</h5>
                    </div>
                    <div class="card-body " >
                        <h2 class="mt-5 mb-4 card-title pricing-card-title " >文章管理 </h2>
                        <p class="mb-2">請按下方按鈕<br>進入管理頁面</p>
                        <p class="mb-5">Please press the button below to enter the back end system page.</p>
                        <input type="button" class="btn btn-lg btn-block btn-info " value="Enter" onclick="location.href='../article/index.php'">
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal">ITEMS</h5>
                    </div>
                    <div class="card-body " >
                        <h2 class="mt-5 mb-4 card-title pricing-card-title " >商品管理 </h2>
                        <p class="mb-2">請按下方按鈕<br>進入管理頁面</p>
                        <p class="mb-5">Please press the button below to enter the back end system page.</p>
                        <button type="button" class="btn btn-lg btn-block btn-info ">Enter</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal">CATEGORY</h5>
                    </div>
                    <div class="card-body " >
                        <h2 class="mt-5 mb-4 card-title pricing-card-title " >類別管理 </h2>
                        <p class="mb-2">請按下方按鈕<br>進入管理頁面</p>
                        <p class="mb-5">Please press the button below to enter the back end system page.</p>
                        <button type="button" class="btn btn-lg btn-block btn-info ">Enter</button>
                    </div>
                </div>
                <div class="card mb-4 shadow-sm">
                    <div class="card-header">
                        <h5 class="my-0 font-weight-normal">MEMBER</h5>
                    </div>
                    <div class="card-body " >
                        <h2 class="mt-5 mb-4 card-title pricing-card-title " >會員管理 </h2>
                        <p class="mb-2">請按下方按鈕<br>進入管理頁面</p>
                        <p class="mb-5">Please press the button below to enter the back end system page.</p>
                        <button type="button" class="btn btn-lg btn-block btn-info ">Enter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once '../templates/adtpl-footer.php'; ?>