<?php
$_POST=sanitize_post($_POST);
if(isset($_POST['export'])){
	global $wpdb;
    
    // Use headers so the data goes to a file and not displayed
     header('Content-Type: text/csv');
     header('Content-Disposition: attachment; filename="export.csv"');

     // clean out other output buffers
     ob_end_clean();

     $fp = fopen('php://output', 'w');

     // CSV/Excel header label
     $header_row = $wpdb->get_col("DESC {$wpdb->prefix}product_settings", 0);
     //removing id column
     if(($key=array_search('id',$header_row))!==false){
        unset($header_row[$key]);
     }
     //write the header
     fputcsv($fp, $header_row);
    // retrieve any table data desired. Members is an example 
    $product_settings = "SELECT * FROM {$wpdb->prefix}product_settings";
    $rows = $wpdb->get_results($product_settings, ARRAY_A);

     if(!empty($rows)) 
       {
        foreach($rows as $Record)
          {   
            unset($Record['id']);
          fputcsv($fp, array_values($Record));       
          }
      }

     fclose( $fp );
     exit;

}