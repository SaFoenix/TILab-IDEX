<?php
	if(($_SERVER['REQUEST_URI']) == '/index_2.php'){
?>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
<!-- 			        <a class="navbar-brand" href="index.php">Accueil</a>
 -->			     	<a class="navbar-brand" href="index.php">Accueil</a>
				</div>
				<ul class="nav navbar-nav">
				<li><a href="forum_categorie.php">Forum</a></li>
			    <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nos Fablabs<span class="caret">
			       </span></a>
			      <ul class="dropdown-menu">
			        <li><a href="#section1">ENSIACET</a></li>	<!-- target="_blank" -->
			        <li><a href="#section2">Mines d'Albi</a></li>
			        <li><a href="#section3">INSA Toulouse</a></li>
			        <li><a href="#section4">Université Toulouse III</a></li>
			        <li role="separator" class="divider"></li>
			        <li class="dropdown-header">Nav header</li>
			        <li><a href="#">Separated link</a></li>
			        <li><a href="#">One more separated link</a></li>
			      </ul>
			    </li>
			    <li><a href="inscription.php">Inscription</a></li>
			    <li><a href="connexion.php">Connexion</a></li>
			  </ul>
			</div>
		</div>
<?php
	}
	else {
?>
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
<!-- 			        <a class="navbar-brand" href="index.php">Accueil</a>
 -->			     	<a class="navbar-brand" href="index.php">Accueil</a>
				</div>
				<ul class="nav navbar-nav">
				<li><a href="forum_categorie.php">Forum</a></li>
			    <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Nos Fablabs<span class="caret">
			       </span></a>
			      <ul class="dropdown-menu">
			        <li><a href="/index.php#section1">ENSIACET</a></li>	<!-- target="_blank" -->
			        <li><a href="/index.php#section2">Mines d'Albi</a></li>
			        <li><a href="/index.php#section3">INSA Toulouse</a></li>
			        <li><a href="/index.php#section4">Université Toulouse III</a></li>
			        <li role="separator" class="divider"></li>
			        <li class="dropdown-header">Nav header</li>
			        <li><a href="#">Separated link</a></li>
			        <li><a href="#">One more separated link</a></li>
			      </ul>
			    </li>
			    <li><a href="inscription.php">Inscription</a></li>
			    <li><a href="connexion.php">Connexion</a></li>
			  </ul>
			</div>
		</div>
<?php
	}
?>