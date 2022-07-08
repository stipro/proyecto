<?php $nameModule =  $d->title;
$titleMinuscula = strtolower($nameModule); ?>
<?php if ($titleMinuscula == 'home') : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo CSS . 'home.css'; ?>" media="all" />
<?php else : ?>
    <link type="text/css" rel="stylesheet" href="<?php echo CSS . 'site.css'; ?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo CSS . 'site-forms.css'; ?>" media="all" />
    <link type="text/css" rel="stylesheet" href="<?php echo CSS . 'site-responsive.css'; ?>" media="all" />
<?php endif; ?>

<script src="https://kit.fontawesome.com/aeb246fa89.js" crossorigin="anonymous"></script>

<!-- Bootstrap core CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"> -->
<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

<!-- Datatable css -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">

<!-- Select2 css -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

<!-- Todo plugin debe ir debajo de está línea -->
<!-- Toastr css -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Waitme css -->
<link rel="stylesheet" href="<?php echo PLUGINS . 'waitme/waitMe.min.css'; ?>">

<!-- Lightbox -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" />

<!-- Estilos en header deben ir debajo de esta línea -->
<style>
</style>

<!-- Estilos registrados manualmente -->
<?php echo load_styles(); ?>




<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,600" rel="stylesheet" type="text/css">

<!-- Estilos personalizados deben ir en main.css o abajo de esta línea -->
<link rel="stylesheet" href="<?php echo CSS . 'main.css?v=' . get_version(); ?>">