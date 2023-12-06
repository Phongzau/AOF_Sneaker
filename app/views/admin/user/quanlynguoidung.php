<?php
  $html_show_user = show_user_admin($user);
?>
<div class="container mt-3">
    <h2>Users</h2>
    <div class="d-flex justify-content-end">
      <input type="text" placeholder="Tìm kiếm người dùng">
      <button type="submit">Search</button>
    </div>  
    <p></p>            
    <table class="table table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>Password</th>
          <th>User_name</th>
          <th>Ảnh</th>
          <th>Địa Chỉ</th>
          <th>Email</th>
          <th>Điện thoại</th>
          <th>Chức vụ</th>
          <th>Chức năng</th>
        </tr>
      </thead>
      <tbody>
        <?=$html_show_user?>
      </tbody>
    </table>
  </div>