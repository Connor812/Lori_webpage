<?php
require_once 'header.php';
?>

<div class="ocean-image">
    <h1 style="margin-top: 10%;">Unlimited Revisions</h1>
    <h6>Confidential help for women seeking change<br> On-Line Gude and Guided Journal<br></h6>
</div>
<!--wrapper-->
<div class="wrapper p-3">
    <!--welcome blurb-->
    <div class="container-fluid" style="padding: 0% 5%;">
        <h3>Welcome</h3>
        <p>CONGRATULATIONS! You have taken an important step in your self-care. The commitment you are making to
            self-analysis will benefit many aspects of your life, particularly decision-making about relationships. UR
            is
            for
            women who have coped with toxic, abusive or dissatisfying relationships and the impact, which can be
            long-lasting
            in surprising ways. UR is for women seeking that elusive self-love that immunizes from further harm. I
            congratulate
            you making this choice!</p>
        <p>The <b>UR</b> pathway and tools can help you realize the change that comes from within. Here is an outline of
            the
            pathway we will take.</p>
        <div style="text-align: center;">
            <p>Four journal parts alternating with four support sessions.</p>
            <h6>Part One: Getting to Know Me</h6>
            <p>An individual consultation with Lori<br>ENTER the pathway support session</p>
        </div>
        <div style="text-align: center;">
            <h6>Part Two: Getting Ready to Excavate</h6>
            <p>An individual consultation with Lori<br>EXCAVATE support session</p>
        </div>
        <div style="text-align: center;">
            <h6>Part Three: Getting to EXAMINE</h6>
            <p>An individual consutation with Lori<br>EXAMINE support session</p>
        </div>
        <div style="text-align: center;">
            <h6>Part Four: Getting ready to EXIT</h6>
            <p>An individual consutation with Lori<br>EXIT support session</p>
        </div>
    </div>
    <!--Mission-->
    <div class="ulbluebg">
        <div class="uralert">
            <div class=" row">
                <div class="col py-3" style="text-align: center;">
                    <img class="image-reponsive" src="images/misson.jpg"
                        style="width: 100%; max-height: auto; border-radius: 20px;">
                </div>
                <div class="col-sm-8 py-5">
                    <h3 style="text-align: center;">New Mission</h3>
                    <hr>
                    <h5>
                        <ul>
                            <li> To spend time and energy on YOU.</li>
                            <br>
                            <li> To begin looking at your current/past circumstances (including stressors, family
                                history and
                                concerns
                                about yourself and the relationships you have had)
                            </li>
                            <br>
                            <li>To learn more about what experts define as toxic, abusive or healthy relationships
                            </li>
                            <br>
                            <li> To identify questions you have about yourself</li>
                        </ul>
                        <?php
                        if (!isset($_SESSION['user_id'])) {
                            echo '
                            <form action="signup.php">
                            <button name="submit" class="btn btn-outline-secondary" type="submit">Register</button>
                            </form>
                            ';
                        }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>


    <?php
        if (isset($_SESSION['user_id'])) {
            echo '<form class="container-fluid p-3" id="journal-form" method="post" action="includes/journal-form.inc.php">
            ';
            require_once 'journal-form.php';
            echo '
                    <button id="journal-submit-btn" type="submit" class="journal-submit-btn hide">Submit</button>
            </form>';
        }
    ?>

    <?php
    require_once 'footer.php';
    ?>