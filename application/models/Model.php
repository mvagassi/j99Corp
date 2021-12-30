<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


// Syarat  :  

// 1 . Select  = View 
// 2 . Insert  = Ins
// 3 . Update  = Updt
// 4 . Delete  = Del

class Model extends CI_Model
{
    ////// MASTER //////
    public function LoginAdmin($user, $pass)
    {
        $Query = $this->db->query("SELECT * FROM v_user WHERE username = '$user' AND password_hash= '$pass'");
        return $Query;
    }

    public function LastId($kolom, $table)
    {
        $Query = $this->db->query("SELECT MAX($kolom) AS LastIdFix FROM  $table");
        return $Query->result_array();
    }
    public function View($Table)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table);
        return $Query->result_array();
    }

    public function code($Query)
    {
        $query_result = $this->db->query("" . $Query . "");
        return $query_result->result_array();
    }

    public function ViewWhereNot($Table, $WhereField, $WhereValue)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " NOT LIKE '" . $WhereValue . "'");
        return $Query->result_array();
    }

    public function ViewWhereLikeOr($Table, $WhereField1, $WhereValue1, $WhereField2, $WhereValue2)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField1 . " LIKE '%" . $WhereValue1 . "%' OR " . $WhereField2 . " LIKE '%" . $WhereValue2 . "%'");
        return $Query->result_array();
    }

    public function ViewBetween($Table, $Column, $WhereValue1, $WhereValue2)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $Column . "  BETWEEN '" . $WhereValue1 . "' AND '" . $WhereValue2 . "' ");
        return $Query->result_array();
    }

    public function ViewBetweenOrder($Table, $Column, $WhereValue1, $WhereValue2, $Order)
    {

        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $Column . "  BETWEEN '" . $WhereValue1 . "' AND '" . $WhereValue2 . "' ORDER BY " . $Order . " ");
        return $Query->result_array();
    }

    public function ViewASC($Table, $Order)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " ASC");
        return $Query->result_array();
    }

    public function ViewDesc($Table, $Order)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " DESC");
        return $Query->result_array();
    }

    public function ViewLimit($Table, $Order, $Limit)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " ORDER BY " . $Order . " DESC LIMIT 0,$Limit");
        return $Query->result_array();
    }

    public function View2Or($Table, $Where, $WhereValue, $OrWhere, $OrWhereValue)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $Where . " = '" . $WhereValue . "' OR " . $OrWhere . " = '" . $OrWhereValue . "' ");
        return $Query->result_array();
    }

    public function ViewWhere($Table, $WhereField, $WhereValue)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " = '" . $WhereValue . "'");
        return $Query->result_array();
    }

    public function ViewWhereAktor($Table, $WhereField, $WhereValue)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " = '" . $WhereValue . "' ORDER BY id DESC");

        return $Query->result_array();
    }

    public function ViewWhereAnd($Table, $WhereField, $WhereValue,  $WhereField2, $WhereValue2)
    {
        $Query = $this->db->query("SELECT * FROM " . $Table . " WHERE " . $WhereField . " = '" . $WhereValue . "' AND  " . $WhereField2 . " = '" . $WhereValue2 . "' ");
        return $Query->result_array();
    }

    public function Insert($Table, $Value)
    {
        $Query = $this->db->insert($Table, $Value);
        return $Query;
    }

    public function Update($Table, $Where, $WhereValue, $Value)
    {
        $this->db->where($Where, $WhereValue);
        $this->db->update($Table, $Value);
    }

    public function Delete($Table, $Where, $WhereValue)
    {
        $this->db->where($Where, $WhereValue);
        $this->db->delete($Table);
    }

    public function Update_Delete($Table, $Where, $WhereValue, $Value)
    {
        $this->db->where($Where, $WhereValue);
        $this->db->update($Table, $Value);
    }

    public function GetId($Id, $Table)
    {
        $Query = $this->db->query("SELECT max($Id) FROM " . $Table . " ");
        return $Query->result_array();
    }
    // ===================================GET BANNER HOMEPAGE===================================================
    public function GetBannerHomeDesk()
    {
        $Query = $this->db->query("SELECT * FROM banner WHERE nama_banner LIKE '%homepage-ms-slim%' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerHomeIpad()
    {
        $Query = $this->db->query("SELECT * FROM banner WHERE nama_banner LIKE '%homepage-ms-slim%' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerHomeMob()
    {
        $Query = $this->db->query("SELECT * FROM banner WHERE nama_banner LIKE '%homepage-ms-slim%' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER HOMEPAGE===================================================
    // ===================================GET BANNER ABOUT US===================================================
    public function GetBannerAboutUsDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'aboutUs_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerAboutUsIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'aboutUs_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerAboutUsMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'aboutUs_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER ABOUT US===================================================
    // ===================================GET BANNER OUR PRODUCTS===================================================
    public function GetBannerOurProductsDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourProduct_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerOurProductsIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourProduct_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerOurProductsMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourProduct_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER OUR PRODUCTS===================================================
    // ===================================GET BANNER OUR SELLER===================================================
    public function GetBannerOurSellerDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourSeller_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerOurSellerIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourSeller_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerOurSellerMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'ourSeller_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER OUR SELLER===================================================
    // ===================================GET BANNER SLIM DAILY===================================================
    public function GetBannerSlimDailyDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimDaily_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerSlimDailyIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimDaily_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerSlimDailyMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimDaily_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER SLIM DAILY===================================================
    // ===================================GET BANNER CONTACT US===================================================
    public function GetBannerContactUsDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'contactUs_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerContactUsIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'contactUs_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerContactUsMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'contactUs_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER CONTACT US===================================================
    // ===================================GET BANNER CONTACT US===================================================
    public function GetBannerSlimCapsDesk()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimCaps_msslim_banner' AND resolusi = 'desktop' ");
        return $Query->result_array();
    }

    public function GetBannerSlimCapsIpad()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimCaps_msslim_banner' AND resolusi = 'ipad' ");
        return $Query->result_array();
    }

    public function GetBannerSlimCapsMob()
    {
        $Query = $this->db->query("SELECT banner_url FROM banner WHERE nama_banner = 'slimCaps_msslim_banner' AND resolusi = 'mobile' ");
        return $Query->result_array();
    }
    // ===================================end GET BANNER CONTACT US===================================================

    public function count_all($cat = "", $keyword = "")
    {
        if (!empty($keyword) && empty($cat)) {
            $keyword = "AND judul LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 " . $keyword . "ORDER BY date_posting_blog;";
        } elseif (empty($keyword) && !empty($cat)) {
            $cat = "AND nama_kategori = '" . $cat . "' ";
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 " . $cat . "ORDER BY date_posting_blog;";
        } else {
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 ORDER BY date_posting_blog;";
        }



        return $this->db->query($Query)->num_rows();
        // return $Query;
    }

    public function get_search($cat = "", $keyword = "", $limit = "", $start = "")
    {
        if (!empty($keyword) && empty($cat)) {
            $keyword = "AND judul LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 " . $keyword . "ORDER BY date_posting_blog DESC LIMIT " . $start . ", " . $limit . ";";
        } elseif (empty($keyword) && !empty($cat)) {
            $cat = "AND nama_kategori = '" . $cat . "' ";
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 " . $cat . "ORDER BY date_posting_blog DESC LIMIT " . $start . ", " . $limit . ";";
        } else {
            $Query = "SELECT * FROM v_blog_msslim WHERE is_delete = 0 AND posting_blog = 1 ORDER BY date_posting_blog DESC LIMIT " . $start . ", " . $limit . ";";
        }

        $data = $this->db->query($Query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {

                $a_id_article = sha1($row['id']);
                $salt = "0h$%02d$%s";
                $c_id_article = crypt($a_id_article, $salt);
                $v = str_replace('/', '', $c_id_article);

                $jumlahkarakter = 150;

                $text = $row['isi_blog'];
                $char     = $text{
                    $jumlahkarakter - 1};
                while ($char != ' ') {
                    $char = $text{
                        --$jumlahkarakter}; // Cari spasi pada posisi 49, 48, 47, dst...
                }
                $cetak = substr($text, 0, $jumlahkarakter) . ' ';

                $output .= '
                <div style="background: transparent; border-radius: 25px;">
                                  <a href="' . base_url() . 'Detail_artikel?v=' . $v . '">
                                      <img class="image-artikel" src="' . base_url() . '' . $row['gambar'] . '" alt="" />
                                  </a>
                                  <a href="' . base_url() . 'Detail_artikel?v=' . $v . '">
                                  <div class="judul-artikel">' . $row['judul'] . '</div>
                              </a>
                              </div>
                              
                              <div class="post-meta list list-inline-divided text-style-btn">
                              
                                  <div class="post-tags" style="padding-right: 44px;">
                                      <div class="post-tag" style="color: #8D223C; font-weight:600; font-size:14px; line-height:21px;">
                                          <i>' . $row['nama_kategori'] . '</i>
                                      </div>
                                  </div>
                                  <div class="list-item">
                                      <div class="post-date" style="color: #8D223C; font-weight:600; font-size:14px; line-height:21px;">
                                          <i>' . date('j F Y', strtotime($row['date_posting_blog'])) . '</i>
                                      </div>
                                  </div>
                              </div>
                              <div class="text-blog">
                                  <p style="padding: 10px 0px;">
                                  <div class="text-blog-content">
                                     ' . $cetak . ' <a href="' . base_url() . 'Detail_artikel?v=' . $v . '"> [read more...] </a>
                                  </div>
                                  </p>
                              </div>
				';
            }
        } else {
            $output = '<h1 style="font-family:Poppins; font-size:2.676rem;"> Sorry, No Results Found! </h1>';
        }
        return $output;
    }

    public function Count_Page($page = "")
    {
        $Query = $this->db->query("UPDATE tb_pageviews SET total_count_page = total_count_page+1 WHERE page='" . $page . "' ");
        // return $Query->result_array();
    }

    public function Count_Total_Visitor($session = "", $time = "")
    {
        $Query = $this->db->query("UPDATE visitor SET total_count_visit = total_count_visit+1 , session = '" . $session . "', time='" . $time . "' ");
        // return $Query->result_array();
    }

    public function Count_Total_Visitor_1($tanggal = "")
    {
        $Query = $this->db->query("UPDATE visitor SET total_count_visit = total_count_visit+1 WHERE tanggal = '" . $tanggal . "' ");
        // return $Query->result_array();
    }

    public function Count_Total_Visitor_2()
    {
        $Query = $this->db->query("UPDATE visitor SET total_count_visit = total_count_visit+1  ");
        // return $Query->result_array();
    }

    public function CountTestimoniPerProduct($nama_product = "")
    {
        $Query = $this->db->query(" SELECT COUNT(nama_product) AS jml_testi FROM v_testimoni_product WHERE is_delete = 0 AND nama_product ='" . $nama_product . "' ");
        return $Query->result_array();
    }

    public function CountPublishTesti($nama_product)
    {
        $Query = $this->db->query(" SELECT COUNT(publish) AS jml_publish FROM v_testimoni_product WHERE is_delete = 0 AND publish = 1 AND nama_product = '" . $nama_product . "' ");
        return $Query->result_array();
    }

    public function CountBannerHomepage($resolusi = "", $nama_banner = "")
    {
        $Query = $this->db->query(" SELECT COUNT(resolusi) AS jml_resolusi FROM v_banner WHERE resolusi = '" . $resolusi . "' AND nama_banner ='" . $nama_banner . "' ");
        return $Query->result_array();
    }
    public function ViewBannerHomepage()
    {
        $Query = $this->db->query(" SELECT * FROM v_banner WHERE nama_banner LIKE '%homepage-ms-slim%'  ");
        return $Query->result_array();
    }

    //=============================================GET DATA OUR SELLER=========================================

    public function count_all_seller($keyword = "", $seller = "")
    {
        if (!empty($keyword) && empty($seller)) {
            // $keyword = "kota LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC;";
        } elseif (empty($keyword) && !empty($seller)) {
            $tSeller = explode(' - ', $seller);
            $kode_seller = $tSeller[1];
            $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif ORDER BY nama_lokasi ASC;";
        }

        return $this->db->query($Query)->num_rows();
        // return $Query;
    }

    public function get_search_seller($keyword = "", $seller = "", $limit = "", $start = "")
    {
        if (!empty($keyword) && empty($seller)) {
            // $keyword = "kota LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
        } elseif (empty($keyword) && !empty($seller)) {
            $tSeller = explode(' - ', $seller);
            $kode_seller = $tSeller[1];
            $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
        }

        $data = $this->db->query($Query);
        $output = '';
        if ($data->num_rows() > 0) {

            $no = 0;
            foreach ($data->result_array() as $row) {
                $lowercase = strtolower($row['nama_lokasi']);
                if (empty($row['telepon'])) {
                    $call = "Not Available";
                } else {
                    $call = "Hubungi Seller Ini";
                }

                if (empty($row['ig'])) {
                    $ref_ig = "Not Available";
                } else {
                    $ref_ig = $row['ig'];
                }
                //<div class="text-att-1-ourseller"><i>Seller Status</i></div>
                $output .= '
                
                <div class="col-12 col-md-6 col-lg-4">
                      <!-- Blurb hover-->
                      <div class="blurb blurb-icon-left" style="border: 1px solid #C4C4C4; border-radius: 15px; margin-bottom: 8%;">
                          <div class="spacer-box-ourseller">

                              <div class="text-att-header-ourseller">' . ++$no . '. ' . ucwords($lowercase) . '</div>
                              <div class="text-att-1-ourseller"><i>Seller ID : ' . $row['member_code'] . '</i></div>
                              

                              <div class="spacer-start-detail-ourseller-sosmed"></div>
                              <div class="detail-ourseller-sosmed">
                                  <div class="row fit-spacer-row">
                                      <div class="col-1 col-md-2 col-lg-2">
                                          <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/store-icon.svg" alt="" />
                                      </div>
                                      <div class="col-11 col-md-10 col-lg-10 fit-spacer-konten-sosmed">
                                          <a href="' . $row['url_alamat'] . '">
                                            <div class="text-att-2-ourseller">' . $row['member_address'] . '</div>
                                          </a>
                                      </div>
                                  </div>
                                  <div class="row fit-spacer-row">
                                      <div class="col-1 col-md-2">
                                          <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/whatsapp-icon.svg" alt="" />
                                      </div>
                                      <div class="col-11 col-md-10 fit-spacer-konten-sosmed">
                                          <a href="https://api.whatsapp.com/send?phone=' . $row['telepon'] . '">
                                            <div class="text-att-2-ourseller"> ' . $call . ' </div>
                                          </a>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="col-1 col-1 col-md-2">
                                          <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/instagram-icon.svg" alt="" />
                                      </div>
                                      <div class="col-11 col-1 col-md-10 fit-spacer-konten-sosmed">
                                          <a href="https://www.instagram.com/' . $row['ig'] . '/">
                                            <div class="text-att-2-ourseller">' . $ref_ig . '</div>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                              <div class="spacer-end-detail-ourseller-sosmed"></div>

                          </div>
                      </div>
                  </div>
				';
            }
        } else {
            $output = '<h1 style="font-family:Poppins; font-size:2.676rem;"> Sorry, No Results Found! </h1>';
        }
        return $output;
    }

    public function get_show_locate($keyword = "", $seller = "")
    {
        if (!empty($keyword) && empty($seller)) {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        } elseif (empty($keyword) && !empty($seller)) {
            $tSeller = explode(' - ', $seller);
            $kode_seller = $tSeller[1];
            $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%unknown%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        }

        $data = $this->db->query($Query);
        $showing_result = '';
        if ($data->num_rows() > 0) {
            if (!empty($keyword) && empty($seller)) {
                foreach ($data->result_array() as $vaShow) {
                    $showing_result .= '               
                    [<b style="font-weight:600; color: #8D233C;">' . $vaShow['kota'] . ', ' . $vaShow['provinsi'] . ' </b>]
         ';
                }
            } elseif (empty($keyword) && !empty($seller)) {
                foreach ($data->result_array() as $vaShow) {
                    $showing_result .= '               
                    [<b style="font-weight:600; color: #8D233C;">' . $vaShow['nama_lokasi'] . ' - ' . $vaShow['member_code'] . ' </b>]
         ';
                }
            } else {
                $showing_result = "DATA NOT FOUND";
            }
        } else {
            $showing_result = '';
        }
        return $showing_result;
    }
    //=============================================END GET DATA OUR SELLER=========================================

    //========================================GET DATA OUR SELLER HOMEPAGE==========================================
    public function count_all_seller_homepage($keyword = "")
    {
        if (!empty($keyword)) {
            // $keyword = "kota LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC;";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif ORDER BY nama_lokasi ASC;";
        }

        return $this->db->query($Query)->num_rows();
        // return $Query;
    }

    public function get_search_seller_homepage($keyword = "", $limit = "", $start = "")
    {
        if (!empty($keyword)) {
            // $keyword = "kota LIKE '%" . $keyword . "%' ";
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
        }

        $data = $this->db->query($Query);
        $output = '';
        if ($data->num_rows() > 0) {

            $no = 0;
            foreach ($data->result_array() as $row) {
                $lowercase = strtolower($row['nama_lokasi']);

                if (empty($row['telepon'])) {
                    $call = "Not Available";
                } else {
                    $call = "Hubungi Seller Ini";
                }

                if (empty($row['ig'])) {
                    $ref_ig = "Not Available";
                } else {
                    $ref_ig = $row['ig'];
                }
//<div style="font-weight: 300; font-size:10px; line-height:15px; padding:0px 17px;"><i>Seller Status</i></div>
                $output .= '
                
                <tr>
                    <td class="jarak-td-seller">
                        <div style="font-weight: 600; font-size:14px; line-height:21px;">' . ++$no . '. ' . ucwords($lowercase) . '</div>

                        <div style="font-weight: 300; font-size:10px; line-height:15px; padding:0px 17px;"><i>Seller ID : ' . $row['member_code'] . '</i></div>
                        

                        <div style="padding:5px 17px;">
                            <div class="quote-body" style="padding: 5px 0px 0px 0px;">
                                <div class="quote-person">
                                    <img class="logo-image-default" src="' . base_url() . 'assets/images/icon/store-icon.svg" alt="" width="10" height="10" />
                                    <div style="font-weight: 400; font-size:12px; line-height:18px; padding:0px 17px;">' . $row['member_address'] . '</div>
                                </div>
                            </div>

                            <div class="quote-body">
                                <div class="quote-person">
                                    <img class="logo-image-default" src="' . base_url() . 'assets/images/icon/whatsapp-icon.svg" alt="" width="10" height="10" />
                                    <a href="https://api.whatsapp.com/send?phone=' . $row['telepon'] . '">
                                        <div style="font-weight: 400; font-size:12px; line-height:18px; padding:0px 17px;">' . $call . '</div>
                                    </a>                                    
                                </div>
                            </div>

                            <div class="quote-body">
                                <div class="quote-person">
                                    <img class="logo-image-default" src="' . base_url() . 'assets/images/icon/instagram-icon.svg" alt="" width="10" height="10" />
                                    <a href="https://www.instagram.com/' . $row['ig'] . '/">
                                        <div style="font-weight: 400; font-size:12px; line-height:18px; padding:0px 17px;">' . $ref_ig . '</div>
                                    </a>                                    
                                </div>
                            </div>
                            <a href="' . $row['url_alamat'] . '">
                                <button type="button" class="btn btn-lg" style="background-color: #F1819C; font-size:0.8rem; width:100px; padding: 0; border-radius: 5px; height:30px; margin-top:0.75rem">
                                    Locate Store
                                </button>
                            </a>
                        </div>
                        <hr />
                    </td>
                </tr>
				';
            }
        } else {
            $output = '<h1 style="font-family:Poppins; font-size:2.676rem;"> Sorry, No Results Found! </h1>';
        }
        return $output;
    }

    public function get_show_locate_homepage($keyword = "")
    {
        if (!empty($keyword)) {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%unknown%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        }

        $data = $this->db->query($Query);
        $showing_result = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $vaShow) {
                $showing_result .= '   
                    [<i class="text-maroon"> ' . $vaShow['kota'] . ', ' . $vaShow['provinsi'] . ' </i>]
                ';
            }
        } else {
            $showing_result = '';
        }
        return $showing_result;
    }
    //========================================END GET DATA OUR SELLER HOMEPAGE==========================================

    //=================================GET DATA SELLER LOCATION CLIENT NEAREST =============================
    public function count_seller_location($keyword = "", $seller = "", $location_client = "")
    {
        if (!empty($keyword) && empty($seller)) {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC;";
            $Query2 = "SELECT * FROM v_lokasi_aktif WHERE kota = 'xxx' ORDER BY nama_lokasi ASC;";
        } elseif (empty($keyword) && !empty($seller)) {
            $cSeller = strpos($seller, '-');
            if (empty($cSeller)) {
                $nama_seller = substr(strtoupper($seller), 0, 6);
                if ($nama_seller == "MSSLIM") {
                    $tSeller = explode(' - ', $seller);
                    $kode_seller = $tSeller[1];
                    $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
                    $Query2 = "SELECT * FROM v_lokasi_aktif WHERE kota = 'xxx' ORDER BY nama_lokasi ASC;";
                } else {
                    $Query = "SELECT * FROM v_lokasi_aktif WHERE nama_lokasi LIKE '%" . $seller . "%' ORDER BY nama_lokasi ASC;";
                    $Query2 = "SELECT * FROM v_lokasi_aktif WHERE kota = 'xxx' ORDER BY nama_lokasi ASC;";
                }
            } else {
                $tSeller = explode(' - ', $seller);
                $kode_seller = $tSeller[1];
                $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
                $Query2 = "SELECT * FROM v_lokasi_aktif WHERE kota = 'xxx' ORDER BY nama_lokasi ASC;";
            }
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $location_client . "%' ORDER BY nama_lokasi ASC;";
            $Query2 = "SELECT * FROM v_lokasi_aktif WHERE kota <> '" . $location_client . "' ORDER BY nama_lokasi ASC;";
        }

        $q1 = $this->db->query($Query)->num_rows();
        $q2 = $this->db->query($Query2)->num_rows();
        $total_row = $q1 + $q2;
        return $total_row;
        // return $this->db->query($Query)->num_rows();
        // return $Query;
    }
    public function get_search_seller_location($keyword = "", $seller = "", $location_client = "", $limit = "", $start = "")
    {
        if (!empty($keyword) && empty($seller)) {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $keyword . "%' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
            $Query2 = "SELECT * FROM v_lokasi_aktif WHERE member_code = 'xxx' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
        } elseif (empty($keyword) && !empty($seller)) {
            $cSeller = strpos($seller, '-');
            if (empty($cSeller)) {
                $nama_seller = substr(strtoupper($seller), 0, 6);
                if ($nama_seller == "MSSLIM") {
                    $tSeller = explode(' - ', $seller);
                    $kode_seller = $tSeller[1];
                    $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
                } else {
                    $Query = "SELECT * FROM v_lokasi_aktif WHERE nama_lokasi LIKE '%" . $seller . "%' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
                }
            } else {
                $tSeller = explode(' - ', $seller);
                $kode_seller = $tSeller[1];
                $Query = "SELECT * FROM v_lokasi_aktif WHERE member_code = '" . $kode_seller . "' ORDER BY nama_lokasi ASC LIMIT " . $start . ", " . $limit . ";";
            }
        } else {
            $Query = "SELECT * FROM v_lokasi_aktif WHERE kota LIKE '%" . $location_client . "%' UNION SELECT * FROM v_lokasi_aktif WHERE kota NOT LIKE '%" . $location_client . "%' LIMIT " . $start . ", " . $limit . ";";
        }

        $data = $this->db->query($Query);
        $output = '';

        $no = 0;
        if ($data->num_rows() > 0) {
            //HIDE WA DAN IG
            // <div class="row fit-spacer-row">
            //                         <div class="col-1 col-md-2">
            //                             <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/whatsapp-icon.svg" alt="" />
            //                         </div>
            //                         <div class="col-11 col-md-10 fit-spacer-konten-sosmed">
            //                             <a href="https://api.whatsapp.com/send?phone=' . $row['telepon'] . '">
            //                               <div class="text-att-2-ourseller"> ' . $call . ' </div>
            //                             </a>
            //                         </div>
            //                     </div>
            //                     <div class="row">
            //                         <div class="col-1 col-1 col-md-2">
            //                             <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/instagram-icon.svg" alt="" />
            //                         </div>
            //                         <div class="col-11 col-1 col-md-10 fit-spacer-konten-sosmed">
            //                             <a href="https://www.instagram.com/' . $row['ig'] . '/">
            //                               <div class="text-att-2-ourseller">' . $ref_ig . '</div>
            //                             </a>
            //                         </div>
            //                     </div>
            //HIDE WA DAN IG

            foreach ($data->result_array() as $row) {
                $lowercase = strtolower($row['nama_lokasi']);
                if (empty($row['telepon'])) {
                    $call = "Not available";
                } else {
                    $call = "Hubungi Seller Ini";
                }

                if (empty($row['ig'])) {
                    $ref_ig = "Not available";
                } else {
                    $ref_ig = $row['ig'];
                }
                //<div class="text-att-1-ourseller"><i>Seller Status</i></div>
                $output .= '
                    <div class="col-12 col-md-6 col-lg-4">
                    <!-- Blurb hover-->
                    <div class="blurb blurb-icon-left" style="border: 1px solid #C4C4C4; border-radius: 15px; margin-bottom: 8%;">
                        <div class="spacer-box-ourseller">

                            <div class="text-att-header-ourseller">' . ++$no . '. ' . ucwords($lowercase) . '</div>
                            <div class="text-att-1-ourseller"><i>Seller ID : ' . $row['member_code'] . '</i></div>
                            

                            <div class="spacer-start-detail-ourseller-sosmed"></div>
                            <div class="detail-ourseller-sosmed">
                                <div class="row fit-spacer-row">
                                    <div class="col-1 col-md-2 col-lg-2">
                                        <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/store-icon.svg" alt="" />
                                    </div>
                                    <div class="col-11 col-md-10 col-lg-10 fit-spacer-konten-sosmed">
                                        <a href="' . $row['url_alamat'] . '">
                                          <div class="text-att-2-ourseller">' . $row['member_address'] . ', ' . $row['kota'] . '</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="row fit-spacer-row">
                                     <div class="col-1 col-md-2">
                                         <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/whatsapp-icon.svg" alt="" />
                                     </div>
                                     <div class="col-11 col-md-10 fit-spacer-konten-sosmed">
                                         <a href="https://api.whatsapp.com/send?phone=' . $row['telepon'] . '" >
                                           <div class="text-att-2-ourseller"> ' . $call . ' </div>
                                         </a>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-1 col-1 col-md-2">
                                         <img class="img-res-sosmed-ourseller" src="' . base_url() . 'assets/images/icon/instagram-icon.svg" alt="" />
                                     </div>
                                     <div class="col-11 col-1 col-md-10 fit-spacer-konten-sosmed">
                                         <a href="https://www.instagram.com/' . $row['ig'] . '/" target="_blank">
                                           <div class="text-att-2-ourseller">' . $ref_ig . '</div>
                                         </a>
                                     </div>
                                 </div>

                                <br />
                            </div>
                            <div class="spacer-end-detail-ourseller-sosmed"></div>

                        </div>
                    </div>
                </div>
              ';
            }
        } else {
            $output = '<h1 style="font-family:Poppins; font-size:2.676rem;"> Sorry, No Results Found! </h1>';
        }
        return $output;
    }

    public function get_show_locate_seller($keyword = "", $seller = "", $location_client = "")
    {
        // if (!empty($keyword) && empty($seller)) {
        //     $Query = "SELECT * FROM lokasi WHERE kota LIKE '%" . $keyword . "%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        // } elseif (empty($keyword) && !empty($seller)) {
        //     $cSeller = strpos($seller, '-');
        //     if (empty($cSeller)) {
        //         $nama_seller = substr(strtoupper($seller), 0, 6);
        //         if ($nama_seller == "MSSLIM") {
        //             $tSeller = explode(' - ', $seller);
        //             $kode_seller = $tSeller[1];
        //             $Query = "SELECT * FROM lokasi WHERE kode_seller = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
        //         } else {
        //             $Query = "SELECT * FROM lokasi WHERE nama_lokasi LIKE '%" . $seller . "%' ORDER BY nama_lokasi ASC;";
        //         }
        //     } else {
        //         $tSeller = explode(' - ', $seller);
        //         $kode_seller = $tSeller[1];
        //         $Query = "SELECT * FROM lokasi WHERE kode_seller = '" . $kode_seller . "' ORDER BY nama_lokasi ASC;";
        //     }
        // } else {
        //     $Query = "SELECT * FROM lokasi WHERE kota LIKE '%unknown%' GROUP BY provinsi ORDER BY nama_lokasi ASC ;";
        // }

        // $data = $this->db->query($Query);
        $showing_result = '';
        // if ($data->num_rows() > 0) {
        if (!empty($keyword) && empty($seller)) {
            //         foreach ($data->result_array() as $vaShow) {
            //             $showing_result .= '               
            //             [<b style="font-weight:600; color: #8D233C;">' . $vaShow['kota'] . ', ' . $vaShow['provinsi'] . ' </b>]
            //  ';
            //         }
            $showing_result = '';
        } elseif (empty($keyword) && !empty($seller)) {
            //         foreach ($data->result_array() as $vaShow) {
            //             $showing_result .= '               
            //             [<b style="font-weight:600; color: #8D233C;">' . $vaShow['nama_lokasi'] . ' - ' . $vaShow['kode_seller'] . ' </b>]
            //  ';
            //         }
            $showing_result = '';
        } else {
            // $showing_result = "DATA NOT FOUND";
            $showing_result = '';
        }
        // } else {
        //     $showing_result = '';
        // }
        return $showing_result;
    }
    //=================================END GET DATA SELLER LOCATION CLIENT NEAREST =========================
}
