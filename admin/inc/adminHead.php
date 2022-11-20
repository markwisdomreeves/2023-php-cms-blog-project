 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <meta name="description" content="">
 <meta name="author" content="">
 <!-- font awesome cdn link  -->
 <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
 <link
   href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
   rel="stylesheet">
 <!-- bootstrap cdn -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <!-- Custom styles for this template-->
 <link href="vendor/css/sb-admin-2.css" rel="stylesheet">

 <style>
/* Admin section */
.custom_category_container {
  margin-top: 80px;
}

.user_custom_blogs_container {
  margin-top: 80px;
}

.custom_admin_sidebar_box {
  background-color: #0f0f3e;
  color: #fff !important;
}

.custom_category_box {
  width: 160px;
  color: #0f0f3e;
  margin-bottom: 25px;
}

.custom_category_box h6 {
  color: #0f0f3e;
  text-decoration: underline;
}

.custom_add_category_btn {
  background-color: #0f0f3e;
  color: #fff !important;
}

.custom_edit_category_btn {
  background-color: #0f0f3e;
  color: #fff !important;
}

.custom_search_button_box button {
  background-color: #0f0f3e;
  color: #fff !important;
}

.custom_admin_table_container th,
td {
  color: black;
  font-weight: bold;
}

/* custom blog post form section */
.main_custom_add_blog_post_container {
  padding: 10px;
  margin-top: 5px;
  margin-bottom: 5px;
}

.inner_main_custom_add_blog_post {
  width: 100%;
  background-color: lightgrey;
  padding: 1.8rem;
}

.main_custom_add_blog_post_container h2 {
  font-size: 1.3rem;
  margin-bottom: 20px;
}

.custom_add_blog_post_box {
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.custom_add_blog_post_box button {
  background-color: #0f0f3e;
  color: #fff !important;
}

/* Add user section */
.add_new_user_form_container {
  width: 100%;
  padding: 1.8rem;
  background-color: lightgrey;
  color: #fff !important;
}

.add_new_users_container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.main_custom_add_new_user_container {
  margin-top: 10px;
  margin-bottom: 10px;
}

.custom_add_user_bio_text_box textarea {
  width: 100%;
}

.custom_admin_icon {
  color: #18151f;
}

.custom_admin_logout_icon {
  color: red;
}

@media screen and (max-width: 520px) {
  .inner_main_custom_add_blog_post {
    width: 100%;
    padding: 0.4rem;
  }
}


/* User Profile page section */
.main_user_profile_container {
  width: 100%;
  display: flex;
  justify-content: center;
  padding: 5px;
}

.custom_update_avatar {
  width: 40px;
  height: 40px;
  border-radius: 50%;
  margin-bottom: 10px;
}

.inner_main_user_profile_container {
  display: flex;
  flex-direction: column;
  max-width: 1200px;
  padding: 10px;
  border: 1px dashed #18151f;
  margin-top: 130px;
  border-radius: 5px;
}

.user_profile_content_box {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.user_profile_content_box img {
  width: 250px;
  height: 250px;
  border-radius: 50%;
}

.user_profile_text_info_box {
  max-width: 700vw;
  padding: 5px;
}

.user_profile_text_info_box h1 {
  font-size: 1.6rem;
  text-transform: capitalize;
  font-weight: 500;
  color: #18151f;
}

.user_profile_text_info_box h5 {
  font-size: 1rem;
  font-weight: 500;
  color: #18151f;
}

.user_profile_text_info_box p {
  font-size: 15px;
  font-weight: 400;
  color: #000;
}

@media screen and (max-width: 960px) {
  .main_user_profile_container {
    padding: 10px;
  }

  .inner_main_user_profile_container {
    padding: 20px;
    border: 1px dashed #18151f;
    margin-top: 50px;
  }

  .user_profile_content_box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .user_profile_content_box img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
  }

  .user_profile_text_info_box h1 {
    margin-top: 20px;
    text-align: center;
  }

  .user_profile_text_info_box h5 {
    margin-top: 5px;
    text-align: center;
  }

  .user_profile_text_info_box h4 {
    text-align: center;
  }

  .user_profile_text_info_box h6 {
    margin-top: 5px;
    text-align: center;
  }

  .user_profile_text_info_box p {
    margin-top: 10px;
    text-align: center;
  }
}


@media screen and (max-width: 780px) {
  .main_user_profile_container {
    padding: 10px;
  }

  .inner_main_user_profile_container {
    padding: 20px;
    border: 1px dashed #fff;
    margin-top: 10px;
  }

  .user_profile_content_box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .user_profile_text_info_box {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 700vw;
    padding: 0;
  }

  .user_profile_text_info_box h1 {
    margin-top: 10px;
  }

  .user_profile_text_info_box h5 {
    margin-top: 5px;
  }

  .user_profile_text_info_box p {
    margin-top: 10px;
    text-align: center;
  }
}

@media screen and (max-width: 560px) {
  .main_user_profile_container {
    padding: 5px;
  }

  .inner_main_user_profile_container {
    padding: 0px;
    border: 1px dashed #fff;
    margin-top: 3px;
  }

  .user_profile_content_box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .user_profile_text_info_box {
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 700vw;
    padding: 0;
  }

  .user_profile_text_info_box h1 {
    margin-top: 10px;
    font-size: 1rem;
    color: brown;
  }

  .user_profile_text_info_box h5 {
    margin-top: 5px;
    font-size: 14px;
    color: brown;
  }

  .user_profile_text_info_box h4 {
    text-align: center;
    font-size: 1rem;
    margin-top: 6px;
  }


  .user_profile_text_info_box p {
    margin-top: 5px;
    text-align: center;
    font-size: 14px;
  }
}

/* Admin Dashboard section */
.main_admin_dashboard_container {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  margin-top: 11rem;
  padding: 10px;
}

.main_inner_admin_dashboard_content_container {
  width: 100%;
  display: flex;
  flex-wrap: wrap;
  flex-direction: row;
  gap: 20px;
  justify-content: space-around;
  align-items: center;
}

.admin_dashboard_items_box {
  width: 200px;
  height: 200px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 20px;
  padding: 15px;
  color: #fff;
  background-color: #0f0f3e;
  margin: 5px;
  text-align: center;
  border: 1px solid #0f0f3e;
}

.admin_dashboard_items_box h1 {
  font-size: 1.4rem;
}

.admin_dashboard_items_box h2 {
  font-size: 1.2rem;
}

.admin_dashboard_items_box h4 {
  font-size: 2rem;
}

.admin_dashboard_items_box h4 i {
  font-size: 2rem;
}

.admin_dashboard_personal_user_items_box {
  max-width: 300px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 10px;
  border: 1px solid #0f0f3e;
  color: #0f0f3e;
}

.admin_dashboard_personal_user_items_box h2 {
  font-size: 1.2rem;
}

.admin_dashboard_personal_user_items_box h4 {
  font-size: 0.9rem;
}

.admin_dashboard_personal_user_items_box img {
  width: 200px;
}

@media screen and (max-width: 558px) {
  .main_admin_dashboard_container {
    margin-top: 1rem;
  }
}

@media screen and (max-width: 420px) {
  table tr td {
    font-size: 10px;
  }

  table tr td a {
    font-size: 10px !important;
  }

  table tr td img {
    width: 800px !important;
  }

  table thead tr th {
    font-size: 12px !important;
  }

}
 </style>