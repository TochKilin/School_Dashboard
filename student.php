<?php 
    $cn = new mysqli("localhost","root","","shcool");
    //$name = 'sok';
   $id=1;
   $sql = "SELECT id FROM schoolsm ORDER BY id DESC";
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
   
   <!-- Registration Form -->
     
    <input type="text" id="searchInput" placeholder="🔍 ស្វែងរកសៀវភៅ..." style="width: 100%; padding: 10px; margin: 20px 0;border-radius: 8px;border: 1px solid grey;outline: none;">  
    <div class="card p-4 mb-4 shadow-sm  frm">
      <h5 class="enter-student">ចុះឈ្មោះសិស្សនៅទីនេះ</h5>
      <form id="studentForm" class="upl">
        <div class="row g-3 mt-2">
          <div>
            <input type="hidden" name="txt-edit-id" id="txt-edit-id" value="0">
          </div>
          <div class="col-md-4">
            <input type="text" value="<?php echo $id;?>" name="txt-id" id="id" class="form-control"  placeholder="id" readonly  style="padding:12px">
          </div>
          <div class="col-md-4">
            <input type="text" name="txt-name" id="name" class="form-control"  placeholder="ឈ្មោះសិស្ស" required style="padding:12px">  
          </div>
          <div class="col-md-3">
            <select id="gender" name="txt-gender" class="form-select" required style="padding:12px">
              <option value="">ភេទ</option>
              <option>ស្រី</option>
              <option>ប្រុស</option>
            </select>
          </div>
          <div class="col-md-3">
            <input type="date" name="txt-dob" id="dob" class="form-control" style="padding:12px"  placeholder="ថ្ងៃកំណើត">
          </div>
          <div class="col-md-4">
            <input type="email" name="txt-email" id="email" class="form-control" placeholder="អ៊ីម៉ែល" required style="padding:12px">
          </div>
          <div class="col-md-2 d-grid">
            <button class="btn btn-success"  type="button" id="btn-post" style="padding:12px">Add</button>
          </div>
        </div>
      </form>

    </div>

    <!-- Student Board -->
    <h5 class="mb-3" style=" font-family: 'Koulen', sans-serif;">សិស្សដែលបានចុះឈ្មោះ</h5>
    <div class="student-board" id="studentBoard"></div>
    
    <table id="tblData">
 
        <tr>
          <th width="40">ID</th>
          <th width="480">Name</th>
          <th>Gender</th>
          <th width="240">Date of birth</th>
          <th>Email</th>
           <th>Action</th>
        </tr>
        <tbody>
        <?php
        
           $sql = "SELECT * FROM  schoolsm order by id DESC";
           $res = $cn->query($sql);
           if($res->num_rows>0){
            while($row = $res->fetch_array()){
              ?>
               
              <tr>
                <td align="center"><?php echo $row[0];?></td>
                 <td><?php echo $row[1];?></td>
                  <td align="center"><?php echo $row[2];?></td>
                   <td align="center"><?php echo $row[3];?></td>
                    <td><?php echo $row[4];?></td>
                    <td align="center">
                       <button type="button" class="btn-view-student" data-id="<?= $row['id'] ?>" style="border:none;border-radius:8px;color:blue;padding:8px;margin-left:15px;"> <i class="fa-solid fa-eye"></i></button>

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
        var btnEdit = '<button class="btn-edit" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        var btnDelete = '<button class="btn-delete" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        var btnview = '<button class="btn-view-student" style="border:none;border-radius:8px;color:blue;padding:8px"> <i class="fa-solid fa-user-pen"></i></button>';
        
        //sub menu
        $('.sidebar').on('click','a',function(){
          var eThis = $(this);
          frmInd = eThis.data('opt');
          $('.card').find('.enter-student').text(eThis.text());
          
        });
        //get edit data
        tbl.on('click','tr td .btn-edit',function(e){

           var tr = $(this).parents('tr');
           var id = tr.find('td:eq(0)').text().trim();
           var name = tr.find('td:eq(1)').text().trim();
           var gender = tr.find('td:eq(2)').text().trim();
           var dob = tr.find('td:eq(3)').text().trim();
           var email = tr.find('td:eq(4)').text().trim();
           $('#id').val(id);
           $('#name').val(name);
           $('#gender').val(gender);
           $('#dob').val(dob);
           $('#email').val(email);
           $('#txt-edit-id').val(id);




          });
       
       
          $('body').on('click', '.btn-delete', function() {
              
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
                  url: "action/delete.php",
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
        })

        
        $('.btn-view-student').click(function () {
          const id = $(this).data('id');
          $.ajax({
            url: 'action/view.php', 
            type: 'POST',
            data: { id: id },
            dataType: 'json',
            success: function (res) {
              if (res.success) {
                const name = res.data.name;
                const gender = res.data.gender;
                const dob = res.data.dob;
                const email = res.data.email;

                const btnclosepopup = "<div class='btn-close-popup'></div>";
                const imgpic = '<div class="pic-box"><img src="logo/logo-1.jpg" alt=""></div>';
                const btnprint = '<button class="btnprint">Print <i class="fa-solid fa-print"></i></button>';
                const imgbox = `<div class="img-box">${imgpic}</div>`;
                const titlebox = `<div class="in-stu"><h5>${imgbox} ព័ត៏មានគ្រូ</h5></div>`;

                const studentname = `
                  <div class="studentname">
                    <div class="row"><span class="label">អត្ថលេខ :</span><span class="value">${id}</span></div>
                    <div class="row"><span class="label">ឈ្មោះគ្រូ :</span><span class="value">${name}</span></div>
                    <div class="row"><span class="label">ភេទ :</span><span class="value">${gender}</span></div>
                    <div class="row"><span class="label">ម៉ោងធ្វើការ :</span><span class="value">${dob}</span></div>
                    <div class="row"><span class="label">តេលេក្រាម :</span><span class="value">${email}</span></div>
                  </div>
                `;

                const itemdetailbox = `<div class="item-detail-box">${titlebox}${studentname}${btnprint}</div>`;
                const popup = `<div class="popup">${itemdetailbox}${btnclosepopup}</div>`;

                $('body').append(popup);
              } else {
                Swal.fire("បរាជ័យ!", "រកមិនឃើញទិន្នន័យ!", "error");
              }
            },
            error: function () {
              Swal.fire("បរាជ័យ!", "មានបញ្ហាក្នុងការទាញទិន្នន័យ!", "error");
            }
          });
        });
        //remove
        body.on('click',".btn-close-popup",function(){
                
                $(this).parent().remove();
        
        
        })
          //save data
          $('#btn-post').click(function(e){
                e.preventDefault(); 
                var eThis= $(this);
                var parent = eThis.parents('.frm');
                var id = parent.find('#id');
                var name = parent.find('#name');
                var gender = parent.find('#gender');
                var dob = parent.find('#dob');
                var email = parent.find('#email');
                if( name.val()==''){
                  Swal.fire("Please Add Data");
                  name.focus();
                  return;
                }
                  var frm = eThis.closest('form.upl');
                  var frm_data = new FormData(frm[0]);
                  $.ajax({
                      url:'action/save-slide.php',
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
                            var btnEdit = '<button type="button" class="btn-edit" data-id="'+data.id+'" style="border:none;border-radius:8px;color:blue;padding:8px"><i class="fa-solid fa-user-pen"></i></button>';
                            var btnDelete = '<button type="button" class="btn-delete" data-id="'+data.id+'" style="border:none;border-radius:8px;color:red;padding:8px"><i class="fa-solid fa-trash"></i></button>';
                            var btnView = '<button type="button" class="btn-view" data-id="'+data.id+'" style="border:none;border-radius:8px;color:blue;padding:8px"><i class="fa-solid fa-eye"></i></button>';
                          if(data.edit == true){
                            Swal.fire("dublicate name");
                            name.focus();
                          }else{

                            if(data.editdpl==true){
                            Swal.fire("Your Data is Updated")
                            }else{
                            var tr = "<tr> <td>"+data.id+"</td> <td>"+name.val()+"</td> <td>"+gender.val()+"</td> <td>"+dob.val()+"</td> <td>"+email.val()+"</td> <td>"+btnview+btnEdit+btnDelete+"</td> </tr>";
                            tbl.find('tr:eq(0)').after(tr);
                            name.val("");
                            gender.val('');
                            dob.val('');
                            email.val('');
                            name.focus();                           
                            id.val( data.id + 1);
                            }
                          
                          }
                          
                          eThis.html('Add');
                          eThis.css({"pointer-envent": "auto"});
                          
                      }

                });

              });
            
         });
  
          //search data
          $('#searchInput').on('keyup', function () {
            const search = $(this).val();

            $.ajax({
              url: 'action/search-student.php',
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
