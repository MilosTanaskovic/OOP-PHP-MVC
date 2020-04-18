<?php  require APPROOT . '/view/inc/header.php'; ?>
        <a href="<?php echo URLROOT; ?>/posts" class="btn light"><i class="fa fa-backward"></i> Back</a>
            <div class="card card-body bg-light mt-5">
                <h2>Edit Post</h2>
                <p>Edit a post with this form.</p>
                <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
                <div class="form-group">
                        <label for="title">Title: <sup>*</sup></label>
                        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                        <spam class="invalid-feedback"><?php echo $data['title_err']; ?></spam>
                    </div>
                    <div class="form-group">
                        <label for="body">Body: <sup>*</sup></label>
                        <textarea type="text" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>">
                            <?php echo $data['body']; ?>
                        </textarea>
                        <spam class="invalid-feedback"><?php echo $data['body_err']; ?></spam>
                    </div>
                    <input type="submit" class="btn btn-success" value="submit">
                </form>
            </div>
       

<?php  require APPROOT . '/view/inc/footer.php'; ?>