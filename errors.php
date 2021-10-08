<?php
if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        
            <strong>$error</strong>
        </div>";
    }
}