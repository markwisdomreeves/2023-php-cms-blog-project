 <meta charset="UTF-8">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
   integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../css/styles.css">
 <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
   integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* blog body section */
body {
  font-family: 'Poppins', sans-serif;
  font-family: 'Source Sans Pro', sans-serif;
}

.custom_blog_title_text {
  font-size: 1.3rem;
  color: #0f0f3e;
}

.custom_blog_about_user_bio_text {
  font-size: 1.2rem;
  color: #0f0f3e;
}

.custom_blog_text_description_box p {
  font-size: 1rem;
}

.custom_blog_details_page_margin_top_box,
.custom_margin_top_box {
  min-height: 100vh;
  margin-top: 3rem;
  margin-bottom: 3rem;
}


.blog_flex {
  display: flex;
  width: 100%;
}

.flex-part1 {
  width: 30%;
  height: 12rem !important;
  border: 1px solid #eee;
}

.right-section {
  flex-direction: column;
}

.right-section h6 {
  background-color: #bbb;
  color: #000;
  padding: 10px;
  border-radius: 5px;
}

.right-section ul li a {
  text-decoration: none;
  color: #555;
  font-size: 0.9rem;
}

.right-section ul li {
  list-style: none;
  border-bottom: 1px solid #eee;
  padding: 4px 0 4px 0;
}

#single_img {
  width: 100%;
  height: 20rem;
}

#single_img img {
  width: 100%;
  height: 100%;
  object-fit: contain;
}

@media only screen and (max-width: 991px) {
  .flex-part1 {
    height: 6rem !important;
  }
}

@media only screen and (max-width: 992px) {
  .flex-part1 {
    height: 8rem !important;
  }
}

@media only screen and (max-width: 1200px) {
  .flex-part1 {
    height: 10rem !important;
  }
}

/* main content page section */
.main_custom_page_container {
  width: 100%;
  min-height: 85vh;
  padding: 10px;
}

/* navbar section */
.custom_form_search_input_box {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.custom_form_search_input_box button {
  background: #18151f;
  color: #fff !important;
  border: 1px solid #fff;
  padding: 7px;
}

@media only screen and (max-width: 576px) {
  .custom_form_search_input_box input {
    margin-right: 5px;
    width: 100%;
  }
}

/* custom footer section */
.main_footer_container {
  width: 100%;
  padding: 10px;
  font-size: 14px;
  background-color: #18151f;
  color: #fff;
}

.main_inner_footer_container {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 5px;
}

.main_inner_footer_container p {
  margin-top: 10px;
  font-size: 12px;
}

/* custom login section */
.main_custom_login_page_container {
  margin-top: 8rem;
}

.main_custom_login_page_container h2 {
  font-size: 1.3rem;
  margin-bottom: 20px;
}

.custom_login_box {
  width: 100%;
  display: flex;
  flex-direction: row;
  align-items: center;
}

.custom_login_box p {
  font-size: 14px;
  margin-top: 10px;
  margin-left: 40px;
  color: black;
}

.custom_login_box p a {
  color: black;
}

.custom_login_box button {
  background-color: #18151f;
  color: #fff !important;
}

.custom_404_page_box {
  margin-top: 10rem;
}

.custom_404_page_box h2 {
  font-size: 5rem;
}

.custom_404_page_box h4 {
  font-size: 3rem;
}

/* Sidebar section */
.blog_and_category_sidebar_container #categories h6,
#posts h6 {
  background-color: #18151f;
  padding: 10px;
  color: #fff;
  font-size: 1.2rem;
}

.no_post_found_message {
  font-size: 16px;
  color: brown;
}

.blog_and_category_sidebar_container h6 {
  font-size: 1rem;
}

.blog_and_category_sidebar_container ul li {
  padding-top: 10px;
  padding-bottom: 10px;
  font-weight: bold;
  font-size: 1.7rem;
  border-bottom: 1px solid #18151f;
}

.blog_and_category_sidebar_container ul li a {
  text-decoration: underline;
}

.blog_and_category_sidebar_container ul h6 {
  text-align: center;
  color: #18151f;
  font-size: 1rem;
}

.no_blog_item_display_message_box {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  text-transform: capitalize;
  color: brown;
}

.no_blog_item_display_message_box h2 {
  font-size: 20px;
  text-align: center;
}

.search_results_text {
  display: flex;
  flex-direction: row;
  font-size: 20px;
  margin-top: 30px;
  margin-bottom: 0;
  text-transform: capitalize;
}

.search_results_text h4 {
  color: brown;
  margin-left: 15px;
}

@media only screen and (max-width: 630px) {
  .search_results_text {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    margin-top: 30px;
    margin-bottom: 0;
    text-transform: uppercase;
  }

  .no_blog_item_display_message_box h2 {
    font-size: 16px;
  }

  .search_results_text h4 {
    font-size: 18px;
    text-align: center;
    margin-top: 10px;
  }
}

/* Blog Card Section */
a,
a:hover {
  text-decoration: none;
  transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
  margin: 2rem 0;
  text-transform: uppercase;
  text-align: center;
  font-size: 2.5rem;
}

.custom_user_avatar_img {
  width: 25px;
}

/* Login and Register navbar section */
.custom_login_and_register_navbar_box {
  width: 100%;
}

.inner_custom_login_and_register_navbar_box {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  padding: 0;
}

.inner_custom_login_and_register_navbar_box li {
  list-style: none;
  margin-top: 10px;
}

.inner_custom_login_and_register_navbar_box li a {
  text-decoration: none;
}

.custom_search_form_box {
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
}

.custom_search_form_box li {
  list-style: none;
  margin-right: 10px;
}

@media only screen and (max-width: 991px) {
  .custom_search_form_box {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
  }

  .custom_login_link_box {
    width: 100%;
  }

  .custom_search_form_box li a {
    margin-left: 0 !important;
    padding-left: 0 !important;
  }

  .custom_search_form_box li {
    margin-bottom: 5px;
  }

  .custom_form_search_input_box {
    width: 100%;
  }
}

/* Blog details page section */
.custom_share_btn_and_others_items_box {
  padding: 10px;
  margin-top: 15px;
  background-color: #18151f;
}

.inner_custom_share_btn_and_others_items_box {
  width: 100%;
  display: flex;
  justify-content: space-evenly;
  flex-direction: row;
  align-items: center;
}

.inner_custom_share_btn_and_others_items_box a,
span {
  margin-right: 20px;
  text-decoration: none;
  color: #fff !important;
  font-size: 1rem;
}

@media only screen and (max-width: 1199px) {
  .custom_blog_text_description_box p {
    font-size: 0.9rem;
  }
}

@media only screen and (max-width: 991px) {

  .inner_custom_share_btn_and_others_items_box a,
  span {
    margin-right: 10px;
    font-size: 16px;
  }
}

@media only screen and (max-width: 769px) {
  .inner_custom_share_btn_and_others_items_box {
    width: 100%;
    display: flex;
    flex-direction: row;
    align-items: center;
  }

  .inner_custom_share_btn_and_others_items_box a,
  span {
    margin-right: 5px;
    font-size: 0.8rem;
  }
}

/* Start of User Profiles and Biography section */
.custom_user_bio_profile_container {
  width: 100%;
  padding: 10px;
  margin-top: 10px;
  border: 2px dashed #18151f;
}

.custom_user_bio_profile_container h4 {
  text-transform: capitalize;
  font-size: 1.3rem;
}

.custom_user_bio_profile_content_box {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin-top: 10px;
}

.user_avatar_and_name_box {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 230px;
  padding: 10px;
}

.user_avatar_and_name_box h5 {
  text-align: center;
  font-size: 1.2rem;
  text-transform: capitalize;
}

.user_avatar_and_name_box h6 {
  text-align: center;
  font-size: 0.8rem;
}

.user_avatar_and_name_box img {
  width: 120px;
}

.user_bio_text_info_box {
  max-width: 800px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 10px;
}

.user_bio_text_info_box p {
  text-align: left;
  margin-top: 90px;
  color: black !important;
}

.user_bio_text_info_box p a {
  color: brown !important;
}

@media only screen and (max-width: 680px) {
  .custom_user_bio_profile_container {
    padding: 5px;
    margin-top: 5px;
    border: 1px dashed #18151f;
  }

  .custom_user_bio_profile_container h4 {
    font-size: 1.1rem;
    text-align: center;
  }

  .custom_user_bio_profile_content_box {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
  }

  .custom_blog_about_user_bio_text {
    font-size: 1.2rem;
    text-align: center;
    margin-bottom: 15px;
  }

  .custom_blog_title_text {
    font-size: 1.2rem;
    color: #0f0f3e;
  }

  .user_avatar_and_name_box {
    width: 200px;
    padding: 5px;
  }

  .user_avatar_and_name_box h5 {
    font-size: 1rem;
  }

  .user_avatar_and_name_box img {
    width: 160px;
    margin-top: 10px;
  }

  .user_bio_text_info_box {
    max-width: 800px;
    padding: 5px;
  }

  .user_avatar_and_name_box h5 {
    text-align: center;
    font-size: 1.3rem;
    text-transform: capitalize;
    margin-bottom: 10px;
  }

  .user_avatar_and_name_box h6 {
    text-align: center;
    font-size: 0.8rem;
    margin-bottom: 10px;
  }

  .user_bio_text_info_box p {
    font-size: 0.9rem;
    margin-top: 10px;
    text-align: center;
  }

}

@media only screen and (max-width: 375px) {
  .custom_user_bio_profile_container {
    padding: 5px;
    margin-top: 5px;
    border: 1px dashed #18151f;
  }

  .custom_user_bio_profile_container h4 {
    font-size: 1.1rem;
    text-align: center;
  }

  .custom_user_bio_profile_content_box {
    margin-top: 5px;
  }

  .user_avatar_and_name_box {
    width: 200px;
    padding: 5px;
  }

  .user_avatar_and_name_box h5 {
    font-size: 1rem;
  }

  .user_avatar_and_name_box img {
    width: 80px;
  }

  .user_bio_text_info_box {
    max-width: 800px;
    padding: 5px;
  }

  .user_bio_text_info_box p {
    font-size: 15px;
  }
}


/* Blog Article section */
.blog_article_item_box {
  width: 100%;
  display: flex;
  flex-direction: column;
  justify-content: center;
  margin-bottom: 30px;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
  color: #18151f;
  padding: 5px;
}

.blog_article_item_box li {
  list-style: none;
}

.blog_article_item_box a {
  display: inline-block;
  list-style: none;
}

.blog_article_item_box img {
  max-width: 100%;
}

.img-profile {
  margin-right: 5px;
}

.blog_article_text_content_box {
  width: 100%;
  font-size: 1rem;
  margin: 0 auto;
  padding: 4px;
}

.blog_article_text_content_box li {
  font-size: 13px;
  color: #18151f;
}

.blog_article_text_content_box h1 {
  font-size: 1.4rem;
  margin-top: 10px;
  margin-bottom: 10px;
  color: #18151f;
  text-transform: capitalize;
}

.text_description_box {
  font-size: 1.1rem;
  margin-top: 10px;
  margin-bottom: 20px;
}

.basic_links_items_box {
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
  padding: 10px;
  color: #18151f !important;
}

.custom_category_button {
  font-size: 13px;
  padding: 5px;
  border-radius: 5px;
  background-color: #18151f;
  color: #fff !important;
}

.custom_index_category_img {
  font-size: 14px !important;
}

.basic_links_items_box li {
  font-size: 1rem;
  text-align: center;
  color: #18151f;
}

.basic_links_items_box li span {
  color: #18151f !important;
  text-align: center;
  font-size: 13px;
}

.basic_links_items_box li a {
  display: flex;
  flex-direction: row;
  align-items: center;
  color: #18151f;
}

.custom_read_more_btn a {
  padding: 5px;
  background: #18151f;
  color: #fff !important;
  border-radius: 5px;
  font-size: 16px !important;
}

@media only screen and (max-width: 520px) {
  .custom_category_button {
    font-size: 13px
  }

  .custom_index_category_img {
    font-size: 13px;
  }

  .custom_user_avatar_img {
    width: 20px;
  }

}

@media only screen and (max-width: 1199px) {
  .blog_article_text_content_box h1 {
    font-size: 1.3rem;
  }

  .text_description_box {
    font-size: 1rem;
  }

}

@media only screen and (max-width: 767px) {
  .blog_article_text_content_box {
    font-size: 0.9rem;
  }

  .basic_links_items_box li {
    font-size: 14px;
  }

  .basic_links_items_box li span {
    font-size: 14px;
  }

  .custom_read_more_btn a {
    padding: 5px;
    font-size: 14px !important;
  }
}


/* Recent sidebar articles section */
.custom_recent_article_box {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 10px;
  background-color: #18151f;
}

.custom_recent_article_box img {
  max-width: 70px;
}

.custom_recent_article_text_box {
  width: 100%;
  margin-left: 15px;
}

.custom_recent_article_text_box h4 {
  font-size: 0.8rem;
  text-transform: capitalize;
  color: #fff;
}

.custom_recent_article_text_box h5 {
  font-size: 12px;
  color: #fff;
}

/* User Profile page section */
.main_custom_user_profile_container {
  width: 100%;
}

.main_custom_user_profile_container header {
  width: 100%;
  background: url("img/bg.jpg") no-repeat 50% 20% / cover;
  min-height: calc(100px + 15vw);
}

.inner_main_custom_user_profile_container {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 20px;
}

.left_custom_user_profile_box {
  padding: 25px 20px;
  text-align: center;
  max-width: 350px;
  position: relative;
  margin: 0 auto;
}

.left_custom_user_profile_img_box {
  position: absolute;
  top: -60px;
  left: 50%;
  transform: translateX(-50%);
}

.left_custom_user_profile_img_box img {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  display: block;
  box-shadow: 1px 3px 12px rgba(0, 0, 0, 0.18);
  background: #1d1d1d;
}

.left_custom_user_profile_text_content_box h2 {
  font-weight: 600;
  font-size: 1.5rem;
  margin-bottom: 5px;
}

.left_custom_user_profile_text_content_box h5 {
  color: brown;
  font-weight: 600;
  font-size: 1rem;
  margin-top: 5px;
}

.left_custom_user_profile_text_content_box h6 {
  font-size: 0.9rem;
  color: #000;
  margin-top: 0;
}

.left_custom_user_profile_text_content_box {
  width: 100%;
  margin-top: 30px;
  padding: 10px;
}

.right_custom_user_profile_box {
  max-width: 700px;
  display: grid;
  grid-template-columns: auto auto auto;
  gap: 10px;
  margin: 0 auto;
  padding: 10px;
}

.custom_user_profile_related_articles_items {
  width: 100%;
  height: 100%;
  box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
}

.custom_user_profile_related_articles_items img {
  width: 100%;
  height: 100%;
  display: block;
  object-fit: cover;
}

@media only screen and (max-width: 940px) {
  .inner_main_custom_user_profile_container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0;
  }

  .left_custom_user_profile_box {
    padding: 25px 20px;
    text-align: center;
    max-width: 700px;
    position: relative;
    margin: 0 auto;
  }

  .left_custom_user_profile_text_content_box h2 {
    font-size: 1.3rem;
  }

  .right_custom_user_profile_box {
    padding: 5px;
    margin-bottom: 20px;
  }
}


@media only screen and (max-width: 640px) {
  .inner_main_custom_user_profile_container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0;
  }

  .left_custom_user_profile_box {
    padding: 25px 20px;
    text-align: center;
    max-width: 700px;
    position: relative;
    margin: 0 auto;
  }

  .left_custom_user_profile_text_content_box h2 {
    font-size: 1.3rem;
  }

  .right_custom_user_profile_box {
    display: grid;
    grid-template-columns: auto auto;
  }
}

@media only screen and (max-width: 520px) {
  .inner_main_custom_user_profile_container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0;
  }

  .right_custom_user_profile_box {
    display: grid;
    grid-template-columns: auto;
  }

  .custom_404_page_box h2 {
    font-size: 3rem;
  }

  .custom_404_page_box h4 {
    font-size: 2rem;
  }
}
 </style>