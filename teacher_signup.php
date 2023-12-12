<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher Sign Up</title>
   <link rel="stylesheet" href="index2.css">
   <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
   <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>

   <section>
      <div class="form-box">
         <div class="form-value">
            <form action="teacher_store.php" method="post">
               <h2>Teacher Sign Up</h2>
               <div class="inputbox">
                  <ion-icon name="person-outline"></ion-icon>
                  <input type="text" name="teacher_name" required><label>Name</label>
               </div>
               <div class="inputbox">
                  <ion-icon name="mail-outline"></ion-icon>
                  <input type="email" name="teacher_email" required><label>Email</label>
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <input type="password" name="pass1" required><label>Password</label>
               </div>
               <div class="inputbox">
                  <ion-icon name="lock-closed-outline"></ion-icon>
                  <input type="password" name="pass2" required><label>Confirm Password</label>
               </div>
               <div class="inputbox">
                  <input type="text" name="teacher_id" required><label>Teacher ID</label>
               </div>
               <div class="inputbox">
                  <input type="text" name="teacher_dept" required><label>Department</label>
               </div>
               <div class="inputbox">
                  <input type="text" name="teacher_phn" required><label>Phone number</label>
               </div>
               <button>Sign Up</button>
            </form>
         </div>
      </div>
   </section>

</body>
</html>