
//fetch data dari json dengan javascript dan jquery
function TampilSemuaMenu(){
    $.getJSON('data/pizza.json',function (data) {
        let menu = data.menu;
        $('#daftar-item').empty();
        $.each(menu,function (i,data) {
            $('#daftar-item').append('<div class="col-md-4">\n' +
                '                    <div class="card mb-3">\n' +
                '                        <img src="img/pizza/'+ data.gambar +'" class="card-img-top">\n' +
                '                        <div class="card-body">\n' +
                '                            <h5 class="card-title">'+ data.nama +'</h5>\n' +
                '                            <p class="card-text">'+ data.deskripsi +'</p>\n' +
                '                            <h5 class="card-title">Rp. '+ data.harga +'</h5>\n' +
                '                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>\n' +
                '                        </div>\n' +
                '                    </div>\n' +
                '                </div>')
        });
    });
}
TampilSemuaMenu();

$('.nav-link').on('click',function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');


    let kategori = $(this).html();
    $('h1').html(kategori);


    if(kategori == 'All Menu'){
        TampilSemuaMenu();
        return;
    }

    $.getJSON('data/pizza.json',function (data) {
        let menu = data.menu;
        let content = '';

        $.each(menu,function (i,data) {
            if(data.kategori == kategori.toLowerCase()){
                content += '<div class="col-md-4">\n' +
                    '                    <div class="card mb-3">\n' +
                    '                        <img src="img/pizza/'+ data.gambar +'" class="card-img-top">\n' +
                    '                        <div class="card-body">\n' +
                    '                            <h5 class="card-title">'+ data.nama +'</h5>\n' +
                    '                            <p class="card-text">'+ data.deskripsi +'</p>\n' +
                    '                            <h5 class="card-title">Rp. '+ data.harga +'</h5>\n' +
                    '                            <a href="#" class="btn btn-primary">Pesan Sekarang</a>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>'
            }
        });
        //jquery carikan saya elemen dengan id berikut lalu timpa isinya dengan apapun yang ada di dalam content
        $('#daftar-item').html(content);
    });
});