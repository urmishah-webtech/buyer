/**
 * Created by Fuad hasan on 11/19/2015.
 */


// sidebar js
        $(document).ready(function() {
            $('.page-sidebar-menu').each(function() {
                $(this).find('.sidebar-sub-menu').parent().addClass('dropdown-inner');
            });
        });
        $(document).ready(function() {
            $('.dropdown-inner').on('click', function(){
                $('.dropdown-inner.active-submenu').not(this).removeClass('active-submenu');
                $(this).toggleClass('active-submenu');
            });
        });
      jQuery(function($) {
          var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
          $('.page-sidebar-menu li a').each(function() {
              $(this).removeClass('active');
              if (this.href === path) {
                $(this).addClass('active').closest('.dropdown-inner').addClass('active-submenu defult-active');
              }
          });
      });

      // header js
      $(document).ready(function() {
         $(".sidebar-toggle").click(function(){
            $("body").toggleClass("full-width");
         });
      });


function form_validate(form_id) {
    var error = 0;
    var msg = '';
    var fname = $('#fname').val();
    var lname = $('#lname').val();
    var email = $('#email').val();
    var password = $('#password').val();
    var repassword = $('#repassword').val();
    var country = $('#country').val();
    var company = $('#company').val();
    var phone_country = $('#phone_country').val();
    var phone_area = $('#phone_area').val();
    var phone_number = $('#phone_number').val();

    var btype = $('#btype').val();
    var p1 = $('#p1').val();
    var p2 = $('#p2').val();
    var p3 = $('#p3').val();

    if (fname === '') {
        error++;
        $('#fname').css('border', '1px solid red');
        msg += error + ". First Name Required <br/>";

    }
    if (lname === '') {
        error++;
        $('#lname').css('border', '1px solid red');
        msg += error + ". Last Name Required <br/>";

    }
    if (email === '') {
        error++;
        $('#email').css('border', '1px solid red');
        msg += error + ". Email Required <br/>";

    }
    if (password === '') {
        error++;
        $('#password').css('border', '1px solid red');
        msg += error + ". password Required <br/>";

    }
    if (repassword === '') {
        error++;
        $('#repassword').css('border', '1px solid red');
        msg += error + ". password Required <br/>";

    }
    if (repassword !== password) {
        error++;
        $('#password').css('border', '1px solid red');
        $('#repassword').css('border', '1px solid red');
        msg += error + ". Password Don't Macth <br/>";

    }
    if (country === '') {
        error++;
        $('#country').css('border', '1px solid red');
        msg += error + ". Country Required <br/>";

    }
    if (company === '') {
        error++;
        $('#company').css('border', '1px solid red');
        msg += error + ". Compnay Required <br/>";

    }
    if (phone_country === '') {
        error++;
        $('#phone_country').css('border', '1px solid red');
        msg += error + ". Country Prefix Required <br/>";

    }
    if (phone_area === '') {
        error++;
        $('#phone_area').css('border', '1px solid red');
        msg += error + ". Area Prefix Required <br/>";

    }
    if (phone_number === '') {
        error++;
        $('#phone_number').css('border', '1px solid red');
        msg += error + ". Phone Number Required <br/>";

    }
    if ($('#supplier').is(':checked') || $('#both').is(':checked')){
        if (btype === '') {
            error++;
            $('#btype').css('border', '1px solid red');
            msg += error + ". Business Type Required <br/>";

        }
        if ((p1 === '') || (p2 === '') || (p3 === '')) {
            error++;
            $('#p1').css('border', '1px solid red');
            msg += error + ". Minimum One Product Required <br/>";

        }
    }
    if (error != 0) {

        $('#validation_error').addClass('alert alert-danger');
        $('#validation_error').html(msg);
    } else {

        var formdata = $("#" + form_id).serialize();
        var action = $("#" + form_id).attr('action');
        $.ajax({
            url: action,
            type: "post",
            data: formdata,
            success: function (data) {


                var er = '';
                var obj = $.parseJSON(data);
                if (obj.type === 'success') {
                    $('#validation_error').removeClass('alert alert-danger');
                    $('#validation_error').addClass('alert alert-success');
                    er += obj.text;


                } else {
                    $('#validation_error').addClass('alert alert-danger');
                    $.each(obj.text, function (index, value) {
                        er += value + '<br/>';
                    });

                }
                $('#validation_error').html(er);
            }
        });
    }

    return false;
}

(function(){
    if($('.error_from_backend').length>0){
        $(document).find('.join_btn').click();
        if ($('#buyer').is(':checked')) {
            $('#divForSeller').slideUp();
        } else {
            $('#divForSeller').slideDown();
        }
    }
    if($('.customer_confirmation').length>0){
        $(document).find('.join_btn').click();
    }
    //console.log($('.error_from_backend').length);
    $('.customer_type').click(function () {
        if ($('#buyer').is(':checked')) {
            $('#divForSeller').slideUp();
        } else {
            $('#divForSeller').slideDown();
        }
    });
})();


// Dashbord Product Chart js
$(function () {
const ctx = document.getElementById('ProductsChart');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [
            'Total published products', 
            'Total sellers products', 
            'Total admin products'
        ],
        datasets: [{
            label: '# of Votes',
            data: [145, 94, 51],
            backgroundColor: [
                '#fd3995',
                '#34bfa3',
                '#5d78ff'
            ],
            borderWidth: 2,
            cutout: 66
        }]
    },
    options: {
      plugins: {
        legend: {
          display: false,
        }
      }
    }
});
});

// Dashbord Sellers Chart js
$(function () {
const ctx = document.getElementById('SellersChart');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [
            'Total sellers', 
            'Total approved sellers', 
            'Total pending sellers'
        ],
        datasets: [{
            label: '# of Votes',
            data: [11, 10, 1],
            backgroundColor: [
                '#fd3995',
                '#34bfa3',
                '#5d78ff'
            ],
            borderWidth: 2,
            cutout: 66
        }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        }
      }
    }
});
});

// Product number of sale chart js

$(function () {
     Chart.defaults.font.size = 11;
    Chart.defaults.color = "#9a9a9a";
    const ctx = document.getElementById('PdSaleChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Men clothing &amp; Fashion',
                'Computer &amp; Accessories',
                'Automobile &amp; Motorcycle',
                'kids &amp; toy',
                'sports &amp; autdoor',
                'Jewelry &amp; watches',
                'Cellphones &amp; Tabs',
                'Beaty, Health &amp; Tabs',
                'Beauty, Helth &amp; Hair',
                'Home improvement &amp; Tools',
                'Home decoration &amp; Appliance',
                'Toy',
                'Software'
            ],
            datasets: [{
                label: '# of Votes',
                data: [11, 18, 5, 1, 4, 0, 4, 5, 0, 0, 0, 0, 2],
                backgroundColor: [
                    'rgb(85, 140, 242, 0.5)'
                ],
                borderColor: [
                    'rgb(85, 140, 242, 1)'
                ],
                borderWidth: 1.5,
                barPercentage: .9
            }]
        },
        options: {
          plugins: {
            legend: {
              display: false
            }
          }, 
          scales: {
              y: {
                grid: {
                  color: '#F2F3F8'
                }
              },
              x: {
                grid: {
                  color: '#F2F3F8'
                },
                ticks: {
                  font: {
                    size: 11,
                  },
                },
              }
            }
        }
    });
});


// Product number of stock chart js

$(function () {
    Chart.defaults.font.size = 11;
    Chart.defaults.color = "#9a9a9a";
    const ctx = document.getElementById('PdStockChart');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                'Men clothing &amp; Fashion',
                'Computer &amp; Accessories',
                'Automobile &amp; Motorcycle',
                'kids &amp; toy',
                'sports &amp; autdoor',
                'Jewelry &amp; watches',
                'Cellphones &amp; Tabs',
                'Beaty, Health &amp; Tabs',
                'Beauty, Helth &amp; Hair',
                'Home improvement &amp; Tools',
                'Home decoration &amp; Appliance',
                'Toy',
                'Software'
            ],
            datasets: [{
                label: '# of Votes',
                data: [20102, 19980, 7538, 6559, 20527, 0, 3998, 10998, 0, 2500, 0, 1, 0],
                backgroundColor: [
                    'rgb(253, 90, 167, 0.5)'
                ],
                borderColor: [
                    '#FF1A85'
                ],
                borderWidth: 1,
                barPercentage: .9
            }]
        },
        options: {
          plugins: {
            legend: {
              display: false
            }
          }, 
          scales: {
              y: {
                grid: {
                  color: '#F2F3F8'
                }
              },
              x: {
                grid: {
                  color: '#F2F3F8'
                },
                ticks: {
                  font: {
                    size: 11,
                  },
                },
              }
            }
        }
    });
});


// home top product js
$(document).ready(function(){
    $(".top-products-slider").slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: false
    });
});

