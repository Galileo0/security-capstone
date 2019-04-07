
<section class="contact" id="contact">
    <div class="container">
        <div class="title text-center">
            <h3>Contact Us</h3>
        </div>
        <?php
        if(isset($_GET['contactError'])){
        echo '<div class="alert alert-warning">Something wrong happen</div>';
        }
        ?>
        <div class="row">
            <div class="col-md-6">
                <div class="left">
                    <form action="process.php" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="useremail">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="name" name="username">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Enter your Message" name="usermsg"  minlength="10" maxlength="500"></textarea>
                        </div>

                        <button name="sendmsg" type="submit" class="btn btn-default">Send</button>
                    </form>

                </div>
            </div>
            
        </div>
    </div>
</section>