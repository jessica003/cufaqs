<?php  

add_shortcode('cufaqs', 'cufaqs');

add_action( 'hook-cufaqs', 'cufaqs');

function cufaqs() { 
  $output = '';
  $output .= '<div class="container" id="page_container">
    <div id="accordion_search_bar_container">
        <input type="search" class="form-control" id="accordion_search_bar" placeholder="Search"/>
    </div><div id="accordion" role="tablist" aria-multiselectable="true">';
  global $wpdb;
          $results = $wpdb->get_results("SELECT * FROM `wp_cu_faq_categories`");
          $i=0;
          foreach( $results as $result){
            $id = $result->id;
            $name = $result->name;
            $output .= '<div class="card_2" id="card_'.$id.'"><h6 style="text-align: center;background-color: #E74C3C;color: white;margin-top: 15px;margin-left: 1rem;font-size: 17px;width:97%"><b>'.$name.'</b></h6>';
            $query = "SELECT * FROM `wp_cu_faqs` WHERE `category`= $id";
            $results2 = $wpdb->get_results($wpdb->prepare($query));
            // $i=0;
            foreach( $results2 as $result2){
               $i++;
              $question_id = $result2->id;
              $category_id = $result2->category;
              $question = $result2->question;
              $answer = $result2->answer;
              $attachment = $result2->attachment;
              $output .= '<div class="card question" id="collapseOne_container_'.$question_id.'"><button class="accordion" id="collapseOne_'.$question_id.'" style="color: #000;font-weight:bold;">'.$i .'.'.$question. '</button>
                     <div class="panel" id="collapseOne_'.$question_id.'">';
                     if ($attachment!='') {
                       $output .= '<p><a href="'.$attachment.'" target="_blank" class="pull-right" style="color:#000"><i class="far fa-file-pdf fa-2x" style="margin-right:30px"></i></a></p>';
                     }

              $output .= '<p style="color: #E74C3C;font-weight:bold;">'.$answer.'</p>
                     </div></div>';
            }
          }
          $output .= '</div></div></div>';
          return $output;
           

} //Function close

?>