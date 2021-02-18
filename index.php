<link href="https://lucasliu.net/img/tag.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
</script>

<div class="container">

    <h1 style="text-align:center">KML to GIS</h1>
    <form class="form-group" action='<?php echo $_SERVER['PHP_SELF'];?>' method='post'>
        <textarea class="form-control" name='kml' rows='20' cols='60'></textarea>
        <textarea class="form-control" rows='20' cols='60'
            readonly><?php echo (isset($_REQUEST['kml']))?kml2gis($_REQUEST['kml']):''; ?></textarea>
        <br />
        <input class="btn btn-outline-primary" type=submit value='轉換'>
    </form>
</div>

<?php
function kml2gis($kml){
	$kml=str_replace("\r\n","\n",$kml);
	$kml=explode("\n",$kml);
	$temp=array();
	foreach($kml as $k=>$v){
		$v="\t\t\t\t{longitude:".trim($v)."}";
		$v=str_replace(",0","",$v);
		$v=str_replace(",",",latitude:",$v);
		$temp[]=$v;
	}
	return implode(",\n",$temp);
}
?>