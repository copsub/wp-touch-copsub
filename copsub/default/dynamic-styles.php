<?php
  header('Content-type: text/css');
  // I can access any WP or theme functions
  // here to get values that will be used in
  // dynamic css below
?>
/* CSS Starts Here */

.example-selector {
  color: <?php echo $color; ?>;
}

.wrappertest {
  width: 100%;
  /* whatever width you want */
  display: inline-block;
  position: relative;
  background-position: center top;
  background-repeat:no-repeat;
  background-size:210% !important;
}
.wrappertest:after {
  padding-top: 56.25%;
  /* 16:9 ratio */
  display: block;
  content: '';
}
.maintest {
  position: absolute;
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  /* let's see it! */
  color: white;
}