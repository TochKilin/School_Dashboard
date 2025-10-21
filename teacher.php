<?php 
    $cn = new mysqli("localhost","root","","shcool");
    //$name = 'sok';
   $id=1;
   $sql = "SELECT id FROM tbl_cher ORDER BY id DESC";
    $res = $cn->query($sql);
    $num = $res->num_rows;
    if($num>0){
      $row = $res->fetch_array();
      $id = $row[0]+1;
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/jpg" href="logo/logo-1.jpg">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100
;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,
500;1,600;1,700;1,800;1,900&family=Battambang:wght@100;300;400;700;900&family
=Bebas+Neue&family=Bokor&family=Cabin:ital,wght@0,400..700;1,400..700&family
=Cascadia+Mono:ital,wght@0,200..700;1,200..700&family=Dangrek&family=DynaPuff:
wght@400..700&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Kanit:
ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,
300;1,400;1,500;1,600;1,700;1,800;1,900&family=Khmer&family=Koulen&family=Monts
errat:ital,wght@0,100..900;1,100..900&family=Odor+Mean+Chey&family=Oswald:wght@
409&family=Outfit:wght@100..900&family=PT+Sans:ital,wght@0,400;0,700;1,400;1,70
0&family=Playfair+Display:wght@400..900&family=Playwrite+AU+SA:wght@100..400&f
amily=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1
,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Preahvihear&family=
Roboto&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&family=Sour+Gummy:ital,wght@0,100..900;1,100..900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&family=Suwannaphum:wght@100;300;400;700;900&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/228abf6277.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="stylesheet" href="style.css">
</head>
<body>

    <input type="text" id="searchInput" placeholder="🔍 ស្វែងរកសៀវភៅ..." style="width: 100%; padding: 10px; margin: 20px 0;border-radius: 8px;border: 1px solid grey;outline: none;">

    <!-- Registration Form -->
    <div class="card p-4 mb-4 shadow-sm  frm">
      <h5>ឈ្មោះលោកគ្រូអ្នកគ្រូ</h5>
      <form id="studentForm" class="upl">
        <div class="row g-3 mt-2">
          <div>
            <input type="hidden" name="txt-edit-id" id="txt-edit-id" value="0">
          </div>
          <div class="col-md-4">
            <input type="text" value="<?php echo $id;?>" name="txt-id" id="id" class="form-control" style="padding:12px;"  placeholder="លេខសម្គាល់" readonly>
          </div>
          <div class="col-md-4">
            <input type="text" name="txt-name" id="name" class="form-control" style="padding:12px"  placeholder="ឈ្មោះគ្រូ" required >  
          </div>
          <div class="col-md-4">
            <select id="gender" name="txt-gender" class="form-select" required  style="padding:12px">
              <option value="">ភេទ</option>
              <option>ស្រី</option>
              <option>ប្រុស</option>
            </select>
          </div>

          <div class="col-md-4">
            <select id="work-time" name="txt-work-time" class="form-select" required style="padding:12px">
              <option value="">ម៉ោងការងារ</option>
              <option>ការងារពេញម៉ោង</option>
              <option>ការងាក្រៅម៉ោង</option>
             
            </select>
          </div>
 
          <!-- salary -->
          <div class="col-md-4">
            <select id="salary" name="txt-salary" class="form-select" required style="padding:12px">
              <option value="">ប្រាក់ខែ</option>
              <option>140</option>
              <option>150</option>
              <option>200</option>
            </select>
          </div>

          <div class="col-md-4">
            <select id="txt-skill" name="txt-skill" class="form-select" required style="padding:12px">
              <option value="">តូននាទី</option>
              <option>គ្រូភាសាខ្មែរ</option>
              <option>គ្រូភាសាអង់គ្លេស</option>
              <option>គ្រូភាសាចិន</option>
            </select>
          </div>

          <!-- salary -->
          <div class="col-md-3">
            <input type="date" name="txt-work-date" id="txt-work-date" class="form-control" style="padding:12px" placeholder="ថ្ងៃចូលធ្វើការ">
          </div>
          <div class="col-md-4">
            <input type="text" name="txt-telegram" id="telegram" class="form-control" placeholder="Telegram" required style="padding:12px" placeholder="លេខទំនាក់ទំនង">
          </div>
          <div class="col-md-2 d-grid">
            <button class="btn btn-success"  type="button" id="btn-post" style="padding:12px">Add</button>
          </div>
        </div>
      </form>

    </div>

    <!-- Student Board -->
   <div id="next-back">
  <div>
    <h5 class="mb-3" style="font-family: 'Koulen', sans-serif;">
      ឈ្មោះគ្រូដែលបានបំពេញការងារ
    </h5>
  </div>

  <div class="b-2">
    <a href="#" class="nav-btn"  id="prevPage">
      <i class="fa-solid fa-chevron-left"></i>
    </a>

    <span class="page-info" id="pageInfo">1 / 3 of 10</span>

    <a href="#" class="nav-btn"  id="nextPage">
      <i class="fa-solid fa-chevron-right"></i>
    </a>
    <a href="#">
      <select name="" id="goToPage" style="width: 90px;text-align: center;">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="50">50</option>
      </select>
    </a>
  </div>
</div>


    <div class="student-board" id="studentBoard"></div>
     
    <table id="tblData">
  <thead>
    <tr>
      <th width="40">ID</th>
      <th width="280">Teacher Name</th>
      <th>Gender</th>
      <th width="140">Work Time</th>
      <th width="140">Salary Ranks</th>
      <th width="140">Skill</th>
      <th width="140">Date of birth</th>
      <th>Telegram</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>
    <?php
      $sql = "SELECT * FROM tbl_cher ORDER BY id DESC";
      $res = $cn->query($sql);
      if($res->num_rows > 0){
        while($row = $res->fetch_array()){
    ?>
        <tr>
          <td align="center"><?php echo $row[0];?></td>
          <td><?php echo $row[1];?></td>
          <td align="center"><?php echo $row[2];?></td>
          <td align="center"><?php echo $row[3];?></td>
          <td align="center">$<?php echo $row[4];?></td>
          <td><?php echo $row[5];?></td>
          <td><?php echo $row[6];?></td>
          <td align="center"><?php echo $row[7];?></td>
          <td align="center">
            <button type="button" class="btn-view" data-id="<?= $row['id'] ?>" style="border:none;border-radius:8px;color:blue;padding:8px;margin-left:15px;"> <i class="fa-solid fa-eye"></i></button>
            <button type="button" class="btn-edit" style="border:none;border-radius:8px;color:blue;padding:8px;margin-left:15px"> <i class="fa-solid fa-user-pen"></i></button>
            <button type="button" class="btn-delete"  data-id="<?= $row['id'] ?>" style="border:none;border-radius:8px;color:red;margin-left:15px;padding:8px"> <i class="fa-solid fa-trash"></i></button>
          </td>
        </tr>
    <?php
        }
      }
    ?>
  </tbody>
</table>
  </div>

  <!-- jQuery Script -->
  <script>
    $(document).ready(function () {
        var tbl = $('#tblData');
        var body = $('body');
        var frmInd;
        var btnEdit = '<button type="button" class="btn-edit" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        var btnDelete = '<button type="button" class="btn-delete" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        var btnview = '<button type="button" class="btn-view" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        
          //sub menu
          $('.sidebar').on('click','a',function(){
            var eThis = $(this);
            frmInd = eThis.data('opt');
          

          });


          //get edit data
          tbl.on('click','tr td .btn-edit',function(){

              var tr = $(this).parents('tr');
              var id = tr.find('td:eq(0)').text().trim();
              var name = tr.find('td:eq(1)').text().trim();
              var gender = tr.find('td:eq(2)').text().trim();
              var worktime = tr.find('td:eq(3)').text().trim();
              var salary = tr.find('td:eq(4)').text().trim().replace('$','');
              var skill = tr.find('td:eq(5)').text().trim();
              var date = tr.find('td:eq(6)').text().trim();
              var telegram = tr.find('td:eq(7)').text().trim();
              $('#id').val(id);
              $('#name').val(name);
              $('#gender').val(gender);
              $('#work-time').val(worktime);
              $('#salary').val(salary);
              $('#txt-skill').val(skill);
              $('#txt-work-date').val(date);
              $('#telegram').val(telegram);
              $('#txt-edit-id').val(id);


          });

          //delete data
          $('body').on('click', '.btn-delete', function() {
               // your delete logic here
               const eThis = $(this);
              const id = eThis.data('id'); 
              console.log("Deleting ID:", id);
              const tr = eThis.closest('tr');
              Swal.fire({
              title: "តើអ្នកពិតជាចង់លុបទិន្នន័យមែនទេ?",
              icon: "warning",
              showCancelButton: true,
              confirmButtonText: "លុប",
              cancelButtonText: "បោះបង់"
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  url: "action/delete-teacher.php", 
                  type: "POST",
                  data: { id: id },
                  success: function (res) {
                    if (res.trim() === "deleted") {
                      tr.remove(); 
                      Swal.fire("លុបបានជោគជ័យ!", "", "success");
                    } else {
                      Swal.fire("បរាជ័យ!", "មានបញ្ហាក្នុងការលុប", "error");
                    }
                  }
                });
              }
            });


          });
          
          //view data
          $('body').on('click','.btn-view',function(){
              const id = $(this).data('id');

              $.ajax({
                url: 'action/view-teacher.php', 
                type: 'POST',
                data: { id: id },
                dataType: 'json',
                success: function (res) {
                  if (res.success) {
                    // const id = res.data.id;
                    const name = res.data.name;
                    const gender = res.data.gender;
                    const worktime = res.data.worktime;
                    const salary = res.data.salary;
                    const skill = res.data.skill;
                    const Date = res.data.Date;
                    const telegram = res.data.telegram;

                    const btnclosepopup = "<div class='btn-close-popup'></div>";
                     const  imgpic ='<div class="pic-box"><img src="logo/logo-1.jpg" alt=""></div>';
                     const btnprint1 = '<button class="btnprint1">Print <i class="fa-solid fa-print"></i></button>';

                    const imgbox = '<div class="img-box">'+imgpic+'</div>';
                    const titlebox = '<div class="in-stu"><h5>'+imgbox+'ព័ត៏មានរបស់គ្រូទូទៅ</h5></div>';
                    const studentname = `
                      <div class="studentname">
                        <div class="row"><span class="label">អត្ថលេខ :</span><span class="value">${id}</span></div>
                        <div class="row"><span class="label">ឈ្មោះគ្រូ :</span><span class="value">${name}</span></div>
                        <div class="row"><span class="label">ភេទ :</span><span class="value">${gender}</span></div>
                        <div class="row"><span class="label">ម៉ោងធ្វើការ :</span><span class="value">${worktime}</span></div>
                        <div class="row"><span class="label">ប្រាក់ខែ :</span><span class="value">${salary}</span></div>
                        <div class="row"><span class="label">តួននាទី :</span><span class="value">${skill}</span></div>
                        <div class="row"><span class="label">ថ្ងៃចូលធ្វើការ :</span><span class="value">${Date}</span></div>
                        <div class="row"><span class="label">លេខទូរសព្ទ :</span><span class="value">${telegram}</span></div>
                      </div>
                    `;

                    const itemdetailbox = `<div class="item-detail-box">${titlebox}${studentname}${btnprint1}</div>`;
                    const popup = `<div class="popup">${itemdetailbox}${btnclosepopup}</div>`;
                    $('.popup').remove();
                    $('body').append(popup);
               
                  }
                   else {
                    //Swal.fire("បរាជ័យ!", "រកមិនឃើញទិន្នន័យ!", "error");
                  }
                
                  },
                error: function () {
                 // Swal.fire("បរាជ័យ!", "មានបញ្ហាក្នុងការទាញទិន្នន័យ!", "error");
                }
              });
            });


            // printbutton

            $('body').on('click', '.btnprint1', function () {
            window.print();
            location.reload(); 
      
          });

          // close popup
          body.on('click',".btn-close-popup",function(){
          $(this).parent().remove();

          })


          //post data to database
          $('#btn-post').click(function(e){
                      
         e.preventDefault(); 
          var eThis= $(this);
          var parent = eThis.parents('.frm');
          var id = parent.find('#id');
          var name = parent.find('#name');
          var gender = parent.find('#gender');
          var worktime = parent.find('#work-time');
          var salary = parent.find('#salary');
          var skill = parent.find('#txt-skill');
          var date = parent.find('#txt-work-date');
          var telegram = parent.find('#telegram');
          if( name.val()==''){
             Swal.fire("Please Add Data");
             name.focus();
             return;
             
          }
            var frm = eThis.closest('form.upl');
            var frm_data = new FormData(frm[0]);
            $.ajax({
                url:'action/teacher-slide.php',
                type:'POST',
                data:frm_data,
                contentType:false,
                cache:false,
                processData:false,
                dataType:"json",
                beforeSend:function(){	
                    eThis.html('<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>');
                    eThis.css({"pointer-events": "none"});
                    

                },
                success:function(data){
                 
                      var btnEdit = '<button class="btn-edit" data-id="'+data.id+'" style="border:none;border-radius:8px;color:blue;padding:8px"><i class="fa-solid fa-user-pen"></i></button>';
                      var btnDelete = '<button class="btn-delete" data-id="'+data.id+'" style="border:none;border-radius:8px;color:red;padding:8px"><i class="fa-solid fa-trash"></i></button>';
                      var btnView = '<button class="btn-view" data-id="'+data.id+'" style="border:none;border-radius:8px;color:blue;padding:8px"><i class="fa-solid fa-eye"></i></button>';
                   
                    if(data.edit == true){
                       Swal.fire("Dublicate Data");
                      name.focus();
                    }else{

                       if(data.editdpl==true){
                        Swal.fire("Your Data is Updated")
                       }else{
                         
                        var tr = "<tr> <td>"+data.id+"</td> <td>"+name.val()+"</td> <td>"+gender.val()+"</td> <td>"+worktime.val()+"</td> <td>"+salary.val()+"</td> <td>"+skill.val()+"</td> <td>"+date.val()+"</td> <td>"+telegram.val()+"</td> <td>"+btnview+btnEdit+btnDelete+"</td>  </tr>";

                      //var tr = "<tr> <td>"+data.id+"</td> <td>"+name.val()+"</td> <td>"+gender.val()+"</td> <td>"+worktime.val()+"</td> <td>"+salary.val()+"</td> <td>"+skill.val()+"</td> <td>"+skill.val()+"</td> <td>"+telegram.val()+"</td> <td>"+btnview+btnEdit+btnDelete+"</td>  </tr>";
                      tbl.find('tr:eq(0)').after(tr);
                            name.val('');
                            gender.val('');
                            worktime.val('');
                            salary.val('');
                            skill.val('');
                            date.val('');
                            telegram.val('');
                      name.focus();
                      //work after success
                      id.val( data.id + 1);
                       }
                     
                    }
                    
                    eThis.html('Add');
                   eThis.css({"pointer-events": "auto"});

                    
                }

          });

          });
      
      
    });


          $('#searchInput').on('keyup', function () {

             const search = $(this).val();
              $.ajax({
                url: 'action/search-teacher.php',
                type: 'POST',
                data: { search: search },
                success: function (res) {
                  $('#tblData tbody').html(res);
                },
                error: function() {
                  alert("មិនអាចទាក់ទងទៅ search-data.php បានទេ");
                }
              });
   
            });


 



  </script>
</body>
</html>
