<?php  

add_shortcode('cufaqs_form', 'cufaqs_form');

add_action( 'hook-cufaqs', 'cufaqs_form');

function cufaqs_form() { 
  global $wpdb;
  if(isset($_POST['save']) && !isset($_POST['question_id']))
  {
    $category=$_POST["category"];
    $question=$_POST["question"];
    $answer=$_POST["answer"];
    if ($category!=''&& $question!=''&& $answer!='') {
      $success = $wpdb->insert("wp_cu_faqs",array(
        "category"=>$category,
        "question"=>$question,
        "answer"=>$answer,

      ));
    }else{
      echo "Please fill the input fields.";
    }
    if ($success) {
      echo "Data saved successfully.";
    }
  }

  if(isset($_POST['update']) && isset($_POST['question_id']))
  {
    $category=$_POST["category"];
    $question=$_POST["question"];
    $answer=$_POST["answer"];
    $questionId=$_POST["question_id"];

    $table = $wpdb->prefix."cu_faqs";
    $data = [
      'category' =>$category,
      'question' =>$question,
      'answer' => $answer,
    ];

    $where = [
      'id' => $questionId,
    ];
    $update = $wpdb->update( $table, $data, $where);

    if ($update) {
      echo "Data updated successfully.";
    }
  }
  $output = ''; 
  $output .= '<div class="container-fluid" id="post_container" style="margin-left:30px;">
  <div class="row">
  <div class="col-md-5" style="margin-right:50px">
  <h2 style="color:#E74C3C">Add New FAQs</h2>
  <form class="post_faq" action="'.$_SERVER["REQUEST_URI"].'" method="post">
        <div class="form-group">
           <label>Category</label>
           <select class="form-control" name="category">
              <option value="">Select</option>';
          $results = $wpdb->get_results("SELECT * FROM `wp_cu_faq_categories` ORDER BY `name`");
          foreach ($results as $result) {
            $id = $result->id;
            $name =$result->name;
            $output .='<option value="'.$id.'">'.$name.'</option>';
          }
    $output .='</select>
        </div>
        <div class="form-group">
            <label>Question</label>
            <input type="text" class="form-control" name="question" placeholder="Question" autocomplete="off"style="width:97%">
        </div>
        <div class="form-group">
            <label>Answer</label>
            <textarea class="form-control" placeholder="Type answer" name="answer" style="width:97%"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="save" value="save">Post</button>
  </form>
        </div>
        <div class="vl" style="border-left: 2px solid #E74C3C;"></div>
       <div class="col-md-5" style="margin-left:30px">
          <h2 style="color:#E74C3C">Edit FAQs</h2>
           <div id="accordion_search_bar_container">
               <input type="search" class="form-control" id="accordion_search_bar" placeholder="Search"/>
           </div><div id="accordion" role="tablist" aria-multiselectable="true" style="height:100vh;overflow-y: scroll;"><div class="card_2" id="card"><h6 style="text-align: center;background-color: #E74C3C;color: white;margin-top: 15px;margin-left: 1rem;font-size: 17px;width:97%"><b></b></h6>';
           // global $wpdb;
                   $results = $wpdb->get_results("SELECT * FROM `wp_cu_faq_categories`");
                   $i=0;
                   foreach( $results as $result){
                     $id = $result->id;
                     $name = $result->name;
                     $query = "SELECT * FROM `wp_cu_faqs` WHERE `category`= $id";
                     $results2 = $wpdb->get_results($query);
                     // $i=0;
                     foreach( $results2 as $result2){
                        $i++;
                       $question_id = $result2->id;
                       $category_id = $result2->category;
                       $question = $result2->question;
                       $answer = $result2->answer;

      $output .='<div class="card question" id="collapseOne_container_'.$question_id.'"><button class="accordion" id="collapseOne_'.$question_id.'" style="color: #000;font-weight:bold;">'.$i .'.'.$question. '<i class="fas fa-pencil-alt edit_faq" id="'.$question_id.'" style="float:right"></i></button></div><div class="container">
        <form class="post_faq" action="'.$_SERVER["REQUEST_URI"].'" method="post" id="post_faq_'.$question_id.'" style="display:none;">
          <div class="form-group">
             <label>Category</label>
             <select class="form-control" name="category">
                <option value="">Select</option>';
                $results3 = $wpdb->get_results("SELECT * FROM `wp_cu_faq_categories` ORDER BY `name`");
                foreach ($results3 as $result3) {
                  $id3 = $result3->id;
                  $name =$result3->name;
                  $output .='<option value="'.$id3.'" '.($id3==$category_id ?'selected="selected"':"").'>'.$name.'</option>';
                }
      $output .='
             </select>
          </div>
          <div class="form-group">
              <label>Question</label>
              <input type="text" class="form-control" name="question" value="'.$question.'" placeholder="Question" autocomplete="off"style="width:97%">
          </div>
          <div class="form-group">
              <label>Answer</label>
              <textarea class="form-control" placeholder="Type answer" name="answer" style="width:97%">'.$answer.'</textarea>
          </div>
          <input type="hidden" name="question_id" value="'.$question_id.'">
          <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form></div>
      ';
    }
  }
  $output .= '</div></div></div></div></div>';
          return $output;
           

} //Function close
