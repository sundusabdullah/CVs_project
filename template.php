
<div id="" class="pt-2">
<?php include 'template/errors.php' ?>

 <form action="" method = "post" class= "pl-4 pr-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ?>">
                </div>
                <div class="form-group">
                    <label for="education">Your Education</label>
                    <input type="text" class="form-control" name="education" value="<?php echo $data['education']?>" >
                </div>

                <div class="form-group">
                    <label for="contact_information"> Contact Information </label>
                    <textarea class="form-control" name="contact_information" rows="3"><?php echo $data['contact_information'] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="skills">Skills</label>
                    <textarea class="form-control" name="skills" rows="3"><?php echo $data['skills'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="work">Work Experiences </label>
                    <textarea class="form-control" name="work" rows="3"><?php echo $data['work'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="projects">Projects </label>
                    <textarea class="form-control" name="projects" rows="3"><?php echo $data['projects'] ?></textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1"> select the section of your CV</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="selector">
                    <option> </option>
                    <option value = "1">Mobile Development </option>
                    <option value = "2">Web Development</option>
                    <option value = "3">Data Analysis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="more_information">Write more information</label>
                    <textarea class="form-control" name="more_information" rows="6"><?php echo $data['more_information'] ?></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-success" style="border-radius: 25px;  background-color:#969FA4; border: none; width: 200px;"> Update </button>
                </div>
               
            </div>
        </div>
    </form>

