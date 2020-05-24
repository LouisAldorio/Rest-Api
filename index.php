<?php

    //API with cURL
    function get_URL($url){
        $curl = curl_init();
        curl_setopt($curl,CURLOPT_URL,$url);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
        $result = curl_exec($curl);
        curl_close($curl);

        return json_decode($result,true);
    }
    //curl untuk title dan jumlah subscriber dan profile pic
    $result = get_URL('https://www.googleapis.com/youtube/v3/channels?key=AIzaSyATWA4dch5lFfFAMCjZwmhxwj_9Z2vsL4Q&part=snippet,statistics&id=UC67xL9VjL_x8WrpfybakMQg');
    $youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
    $channelName = $result['items'][0]['snippet']['title'];
    $subscribers = $result['items'][0]['statistics']['subscriberCount'];


    //curl untuk latest video
    $urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?channelId=UC67xL9VjL_x8WrpfybakMQg&key=AIzaSyCWn7MmPljAhZ_DQIy-M88aiq0v9Dvw6NA&maxResults=5&part=snippet&order=date';
    $result = get_URL($urlLatestVideo);
    $latestVideoID = $result['items'][0]['id']['videoId'];
    $latestVideoID2 = $result['items'][4]['id']['videoId'];
    $latestVideoID3 = $result['items'][2]['id']['videoId'];
    $latestVideoID4 = $result['items'][3]['id']['videoId'];

    require 'function.php';
    //cek apakah tombol submit sudah di tekan atau belum
    if(isset($_POST["send"])){
        //cek apakah data berhasil dimasukkan atau tidak
        if(tambahData($_POST)>0){
            echo "
                    <script>
                        alert('Thanks for contacting us!');
                        document.location.href = 'index.php';
                    </script>
                ";
        }
        else{
            echo "
                    <script>
                        alert('failed to contact');
                        document.location.href = 'index.php';
                    </script>
                ";
        }
    }
    if(isset($_POST["confirm"])){
        if(tambahDataClient($_POST)>0){
            echo "
                    <script>
                        alert('Your data has been Uploaded!');
                        document.location.href = 'index.php';
                    </script>
                ";
        }
        else{
            echo "
                    <script>
                        alert('failed to upload data');
                        document.location.href = 'index.php';
                    </script>
                ";
        }
    }

?>



<!doctype html>
<html lang="en" style="scroll-behavior: smooth">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="icon/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">

    <title>Louis Aldorio Efendi</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/kisspng-letter-alphabet-initial-brooch-burning-letter-a-png-5abb53b20c5e91.1590500015222260980507.jpg" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Louis Aldorio
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#social">Channel</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            More
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="#contact">Contact me</a>
                            <a class="dropdown-item " href="#" data-toggle="modal" data-target="#staticBackdrop">More about you</a>

                        </div>
                    </li>
                </ul>

            </div>
            <div class="my-2 my-lg-0 inline">
                <a href="login.php" class="btn btn-outline-primary">Login as Admin</a>
            </div>
        </div>
    </nav>

    <section id="home">
        <div class="jumbotron">
            <div class="container">
                <div class="text-center">
                    <img src="img/IMG_5171.JPG" class="rounded-circle img-thumbnail">
                    <h1 class="display-4">Louis Aldorio</h1>
                    <h3 class="lead">Student | Programmer | Musician</h3>
                </div>
            </div>
        </div>
    </section>

    <section id="skills">
        <div class="container">
            <h1 class="text-center display-4">My Skills</h1>
            <div class="row mt-5">
                <div class="col-lg-12 col-md-6 col-sm-3">
                    <img src="img/javascript.png" alt="" class="float-left mr-5">
                    <p>One of my best skill is Javascript, I like jaavscript because I think it's unique and it ofcourse can make your website be more interactive.
                    with javascript , I can do many things, such as , masking my website to have a good animative CSS. I can add and remove particular class so my website
                    will look better and more sophisticated. I can do both vanilla javascript and javascript with jquery. I know that nowadays , many company or people commonly
                    use jquery because it's way better and save a lot of time rather than have to write quite a long code just for the same result between using javascript and
                    jquery.</p>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12 col-md-6 col-sm-3">
                    <img src="img/php.png" alt="" class="float-right ml-5">
                    <p>PHP is the most popular languange of web programming recently, I mastered backEnd skills of php, even I created this website by using the PHP language.
                    according to me PHP is quite a great language,efficient and effective. Maybe many of you guys learn programming starting from the strongly typed language
                    which means the programming language that requires data type to be able to run. In PHP, we do not require any declaration of data type. one variable can be assigned
                    with many kind of data type such as integer,string, or maybe array and even object. If many of you have learned form strongly typed language. definitely, you will
                    find that it's easy to learn PHP.</p>
                </div>
            </div>
            <div class="row mt-5 text-center">
                <div class="col-md-4">
                    <div class="card pt-3">
                        <img src="img/html.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">HTML 5</h5>
                            <p class="card-text">HTML is quite and important basic structure for websites</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pt-3">
                        <img src="img/css.png" class="card-img-top" alt="..."">
                        <div class="card-body">
                            <h5 class="card-title">CSS 3</h5>
                            <p class="card-text">CSS becomes what decoreates your lovely websites.</p>
                            <a href="#" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card pt-3">
                        <img src="img/restapi.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">RESTful-API</h5>
                            <p class="card-text">I do fetching data from youtube API in my websites.</p>
                            <a href="" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="social bg-light mt-5" id="social">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2 class="display-4">My Youtube Channel</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 pl-5">
                    <div class="row pl-5">
                        <div class="col-md-4">
                            <img src="<?php echo $youtubeProfilePic; ?>" alt="" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h5><?php echo $channelName; ?></h5>
                            <p><?php echo $subscribers; ?> Subscribers</p>
                            <div class="g-ytsubscribe" data-channelid="UC67xL9VjL_x8WrpfybakMQg" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $latestVideoID; ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $latestVideoID2; ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $latestVideoID3; ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-3">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $latestVideoID4; ?>?rel=0" allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <section class="contact  " id="contact">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2 class="display-4">Contact</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card bg-primary text-white mb-4 text-center">
                        <div class="card-body">
                            <h5 class="card-title">Contact Me</h5>
                            <p class="card-text">Contact me if you need my help or service to build your creative website, I am happily employed</p>
                        </div>
                    </div>

                    <ul class="list-group mb-4">
                        <li class="list-group-item"><h3>Location</h3></li>
                        <li class="list-group-item">My Office</li>
                        <li class="list-group-item">Jl. platina No 15 Medan,Marelan</li>
                        <li class="list-group-item">North Sumatera, Indonesia</li>
                    </ul>
                </div>

                <div class="col-lg-6">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="nomor" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="3" name="pesan" placeholder="Write what you want here"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="send">Send Message</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>



    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center pt-3">
                    <p>Copyright &copy;Louis Aldorio 2020.</p>
                </div>
            </div>
        </div>
    </footer>


    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">More Information About you</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama">Name</label>
                            <input type="text" autocomplete="off" name="nama2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="number">Active Phone-number</label>
                            <input type="text" name="number2" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Upload your Photo :</label>
                            <input type="file" name="gambar" id="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="confirm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>
</html>
