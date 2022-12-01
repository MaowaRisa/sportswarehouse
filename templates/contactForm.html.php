<form action="contact.php" method="POST">
    
    <div class="user-details">
        <div class="row form-heading">
            <h3>Ask your question about us!</h3>
        </div>
        <div class="row">
            <span class="sucessMsg"><?= $successMsg; ?></span>
        </div>
        <div class="row">
            <div class="input-box">
                <!-- <span class="details"></span> -->
                <label for="firstName">
                    <span class="details">First Name
                       <span class="errorMsg">
                            <?php echo $first_name; ?>
                        </span> 
                    </span>
                    
                </label>
                <input type="text" name="firstName" id="firstName" value="<?= setValue("firstName") ?>">
            </div>
            <div class="input-box">
                <label for="lastName">
                    <span class="details">Last Name <span class="errorMsg"><?php echo $last_name; ?></span></span>
                </label>
                
                <input type="text" name="lastName" id="lastName" value="<?= setValue("lastName") ?>">
            </div>
        </div>
        <div class="row">
            <div class="input-box">
                <label for="contactNumber">
                    <span class="details">Contact Number</span>
                </label>
                <input type="text" name="contactNumber" id="contactNumber" value="<?= setValue("contactNumber") ?>">
            </div>
            <div class="input-box">
                <label for="email">
                    <span class="details">Email Address <span class="errorMsg"><?php echo $email; ?></span></span>
                </label>
                <input type="email" name="email" id="email" value="<?= setValue("email") ?>">
            </div>
        </div>

        <div class="row text-area input-box">
            <label for="question">
                <span class="details">Question</span>
            </label>
            <textarea name="question" id="question" rows="4" cols="50"><?= setValue("question") ?></textarea>
        </div>

        <div class="row">
            <button type="submit" class="submitMsgBtn" name="submitMsgBtn">
                <span>SUBMIT</span>
                <i class="fa-sharp fa-solid fa-paper-plane"></i>
            </button>
            <!-- <input type="submit" name="submitBtn" id="submitBtn" value="Send"> -->
        </div>
    </div>

</form>