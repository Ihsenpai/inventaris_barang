<!DOCTYPE html>
<html lang="id">
<head>
    <?php $this->load->view('partials/header') ?>
</head>
<body>
    <?php $this->load->view('partials/navbar') ?>
    
    <div class="container mt-4">
        <?php 
        // Tampilkan pesan flashdata
        if($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">'.$this->session->flashdata('success').'</div>';
        }
        if($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">'.$this->session->flashdata('error').'</div>';
        }
        ?>
        <?php $this->load->view($content) ?>
    </div>

    <?php $this->load->view('partials/footer') ?>
</body>
</html>