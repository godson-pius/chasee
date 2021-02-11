<?php
if (isset($_POST['submit-news'])) {
    $response = AddNews($_POST);
    if ($response === true) {
        echo "<script>alert('News Published')</script>";
    } else {
        $errors = $response;
        foreach ($errors as $err) {
            echo "<script>alert('$err')</script>";
        }
    }
}

if (isset($_POST['submit-class'])) {
    $response = AddClass($_POST);
    if ($response === true) {
        echo "<script>alert('Class Added')</script>";
    } else {
        $errors = $response;
        foreach ($errors as $err) {
            echo "<script>alert('$err')</script>";
        }
    }
}

if (isset($_POST['submit-acad'])) {
    $response = AddAcadYear($_POST);
    if ($response === true) {
        echo "<script>alert('Academic Year Added')</script>";
    } else {
        $errors = $response;
        foreach ($errors as $err) {
            echo "<script>alert('$err')</script>";
        }
    }
}

if (isset($_POST['setYear'])) {
    $response = setAcadYear($_POST);

    if ($response === true) {
        echo "<script>alert('Academic Year Set')</script>";
    } else {
        $errors = $response;
        foreach ($errors as $err) {
            echo "<script>alert('$err')</script>";
        }
    }
}
?>


<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark sidebar-left bg-dark-gray" data-perfect-scrollbar>

            <div class="d-flex align-items-center sidebar-p-a sidebar-account flex-shrink-0">
                <a href="index" class="flex d-flex align-items-center text-underline-0">
                    <span class="mr-3">
                        <!-- LOGO -->
                        <svg width="30px" viewBox="0 0 27 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="drawer-logo-wrapper" stroke="none" stroke-width="1" fill="currentColor" fill-rule="evenodd">
                                <path d="M21.9257604,14.9506975 C20.582703,15.0217165 19.3145795,14.3502722 18.6558508,13.2193504 C18.5961377,13.1299507 18.488013,13.0821416 18.3788008,13.0968482 C18.2695887,13.1115549 18.1791809,13.1860986 18.1471473,13.287853 L16.3403333,18.8266167 C16.0783106,19.5012544 15.4036423,19.9432488 14.6567374,19.9295884 C13.9098324,19.915928 13.2530282,19.4495818 13.0177202,18.7658483 L10.3561926,9.20532122 C10.3224612,9.0828362 10.2066255,8.99820016 10.075223,9.00002907 C9.94382048,9.00185799 9.83056595,9.0896826 9.8005142,9.21305538 C9.53809432,10.6490488 9.07561673,12.0442508 8.42563983,13.3607751 C7.81040896,14.4321066 6.59978897,15.0547797 5.33446397,14.9506975 L0.286383595,14.9506975 C0.200836429,14.9508269 0.119789989,14.987678 0.0652579686,15.0512416 C0.0105052402,15.1148427 -0.011403821,15.1989481 0.00568007946,15.2799517 C1.26517458,21.5063521 6.92177656,26 13.500072,26 C20.0783674,26 25.7349694,21.5063521 26.9944639,15.2799517 C27.0112295,15.1987308 26.9894777,15.1145345 26.935158,15.050392 C26.8808383,14.9862496 26.7996356,14.9488738 26.7137603,14.9484877 C23.5217604,14.9499609 21.9257604,14.9506975 21.9257604,14.9506975 Z" opacity="0.539999962"></path>
                                <path d="M5.48262697,13.1162874 C6.53570764,13.1162874 6.62233928,13.1162874 7.63604194,9.25361392 C7.86780969,8.37139838 8.14008055,7.33311522 8.48548201,6.11058557 C8.7087856,5.42413873 9.37946641,4.96506482 10.1258577,4.98776578 C10.8742462,4.96784002 11.5440567,5.43246093 11.761733,6.1225074 L14.4619398,15.7986995 C14.4940991,15.9151627 14.6022445,15.9971672 14.7273152,15.9999282 C14.8523859,16.0026893 14.9643174,15.9255432 15.0019812,15.8106214 L16.5152221,11.1654422 C16.7421482,10.5403405 17.3447552,10.1140124 18.0318383,10.0924774 C18.6964712,10.0434044 19.3301356,10.3708193 19.6553377,10.9313408 C19.7678463,11.1405147 19.8803549,11.3453535 19.9759873,11.5426056 C20.6296623,12.8128226 20.8198019,13.1119522 21.7761252,13.1119522 L26.7186288,13.1119522 C26.7943575,13.1119652 26.8669186,13.0826781 26.9200192,13.030667 C26.9730799,12.97881 27.0019231,12.9083695 26.9999003,12.8355824 C26.9032945,5.71885474 20.8862135,-0.00118613704 13.4977698,1.84496545e-07 C6.10932623,0.00118650603 0.0942250201,5.72315932 8.19668591e-05,12.8399177 C-0.00175692205,12.9131783 0.0274115935,12.9840093 0.080884445,13.0361333 C0.134357296,13.0882573 0.207535985,13.1171917 0.283603687,13.1162874 L5.48262697,13.1162874 Z" id="Shape"></path>
                            </g>
                        </svg>
                    </span>
                    <span class="flex d-flex flex-column">
                        <span class="sidebar-brand">MNPS</span>
                        <small>Admin Dashboard</small>
                    </span>
                </a>
            </div>


            <ul class="sidebar-menu">
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="index">

                        <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">photo_filter</i>
                        <span class="sidebar-menu-text">Administrator</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-heading">Admin</div>
            <div class="sidebar-block p-0">
                <ul class="sidebar-menu mt-0">
                    <li class="sidebar-menu-item active">
                        <a class="sidebar-menu-button" href="index">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">dvr</i>
                            <span class="sidebar-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal3">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">email</i>
                            <span class="sidebar-menu-text">Add Class</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal4">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">email</i>
                            <span class="sidebar-menu-text">Add New Academic Year</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal2">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">comment</i>
                            <span class="sidebar-menu-text">Set Academic Year</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" href="pending">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">local_offer</i>
                            <span class="sidebar-menu-text">Pending</span>
                            <span class="badge badge-warning badge-notifications ml-auto"><?= getTotal("teachers", "approve", 0); ?></span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a class="sidebar-menu-button" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal">
                            <i class="sidebar-menu-icon sidebar-menu-icon--left material-icons">comment</i>
                            <span class="sidebar-menu-text">Post News</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<!-- // END drawer-layout -->


<!-- Modal for news -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="news-title">Title</label>
                        <input type="text" name="title" class="form-control" id="news-title" placeholder="Enter news title">
                        <small id="emailHelp" class="form-text text-muted">The title that will be displayed.</small>
                    </div>
                    <div class="form-group">
                        <label for="image">News Image</label>
                        <input type="file" class="form-control" name="image" id="image">
                    </div>
                    <div class="form-group">
                        <label for="body">News Content</label>
                        <textarea name="body" class="form-control" id="body" placeholder="Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores asperiores itaque in laborum sapiente, ducimus libero voluptates iure a dolore maxime, accusamus dolorem corporis, impedit dolor labore repellendus. Quae, nisi."></textarea>
                    </div>
                    <input type="submit" name="submit-news" class="btn btn-primary" value="SUBMIT">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for students -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Set Acad Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="news-title">Title</label>
                        <select name="acadYear" required id="" class="form-control">
                            <option selected disabled value="">Select Year</option>
                            <?php
                            $years = fetchAllDesc("academic_years");
                            foreach ($years as $year) { ?>
                                <option value="<?= $year['id'] ?>"><?= $year['academic_year'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <input type="submit" name="setYear" class="btn btn-primary" value="Set Year">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for class -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cname">Class</label>
                        <input type="text" name="cname" class="form-control" id="cname" placeholder="E.g Basic Four">
                        <small id="emailHelp" class="form-text text-muted">Please type it in this format: Basic Four</small>
                    </div>
                    <button type="submit" name="submit-class" class="btn btn-primary">Add Class</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal for class -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
    <div class="modal-dialog shadow" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Academic Year</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="cname">Year</label>
                        <input type="text" name="acad" class="form-control" id="cname" placeholder="Enter Class Name">
                    </div>
                    <button type="submit" name="submit-acad" class="btn btn-primary">Add Year</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>