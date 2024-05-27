<?php
include ('includes/database.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KARScott Codes | portfolio & resume</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
    <section id="hero">
        <div class="overlay"></div>
        <video playsinline autoplay muted loop>
            <source src="./imgs/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="container h-100">
            <div class="d-flex h-100 align-items-start mt-5">
                <div class="w-100 text-white">
                    <h1 class="display-3 mt-5">Kyle Scott | Full-stack Web Developer</h1>
                    <p class="lead mb-3">thank you for visiting my portfolio</p>
                    <a href="#start" class="btn btn-outline-light">Click or Scroll to learn more </a>
                </div>
            </div>
        </div>
    </section>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <div class="container">
                <a name="start" class="navbar-brand" href="#">KARScott Codes | portfolio & resume</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#start">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#projects">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#experiences">Resume</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section id="about">
        <h2 class="display-4 fw-bold text-secondary my-5 ms-5 text-lowercase"><a name="about">my approach</a></h2>
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <p>
                        I bring a unique perspective to web development, informed by my experiences in residential
                        construction and sales. In each field, careful planning, a strong foundation, and a keen eye for
                        detail are essential. It is important to use high-quality materials and technologies to ensure
                        stable, long-lasting products. Clear communication, and a deep understanding of project
                        requirements are key to a successful development process. The skills I have allow me to
                        collaborate effectively to develop user-friendly products and digital environments.
                    </p>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2 row-cols-xl-2 g-4">

                <?php
                $query = "SELECT * from badges";

                $result = mysqli_query($connect, $query);

                foreach ($result as $badge) {
                    echo "
        <div class='col'>
        <div class='d-flex p-4'>
            <div class='icon-container d-inline-flex align-items-center justify-content-center rounded-circle bg-secondary text-white mb-4 flex-shrink-0' style='width: 64px; height: 64px;'>
                " . $badge['svg'] . "
            </div>
            <div class='flex-grow-1 ps-4'>
                <h3 class='text-dark fs-4 fw-bold mb-2'>" . $badge['title'] . "</h3>
                <p class='text-muted'>" . $badge['description'] . "</p>
            </div>
        </div>
        </div>
        ";
                }
                ?>
            </div>

        </div>
    </section>
    <section id="projects" class="pt-5 pb-5 bg-secondary">
        <h2 class="display-4 fw-bold text-white my-5 ms-5 text-lowercase">
            Projects
        </h2>

        <div class="container-fluid">

            <div class="row justify-content-center" style="display:flex; flex-wrap:wrap;">
                <?php
                $query_two = "SELECT * from projects";

                $projects = mysqli_query($connect, $query_two);

                foreach ($projects as $project) {
                    echo "
    <div class='col-md-5 m-5' style='display:flex; align-items: stretch;'>
        <div class='rounded-row row bg-white'>
            <div class='col-md-2'>
                <img style='height:100%; width:auto;' src='" . $project['img_url'] . "' alt='" . $project['short_name'] . " Project Image' class='rounded-xl' />
            </div>
            <div class='col-md-10'>
                <div class='p-3'>
                    <h3 class='pb-2 font-weight-bold text-dark md:text-2xl text-xl'>" . $project['short_name'] . "</h3>
                    <p class='pb-2 md:text-lg text-muted'>" . $project['description'] . "</p>
                    <p class='text-xl font-weight-700 text-dark'> Contributions included: <br /> <span class='pt-2 md:text-lg text-muted'>" . $project['contributions'] . "</span></p>
                    <div class='mt-2 justify-content-end'>";

                    if ($project['url']) {
                        echo "
            <a href='" . $project['url'] . "' class='btn btn-outline-secondary mb-2 me-2'>
                View Project Website
            </a>
        ";
                    }

                    if ($project['repo']) {
                        echo "
            <a href='" . $project['repo'] . "' class='btn btn-outline-secondary mb-2'>
                View Github Repo
            </a>
        ";
                    }

                    echo "
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
                }
                ?>




            </div>


        </div>
    </section>

    <section id="experiences" class="pt-5 pb-5">
        <h2 class="display-4 fw-bold text-secondary my-5 ms-5 text-lowercase">
            <a name="experiences">Experience</a>
        </h2>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4" style="display: flex; flex-wrap: wrap;">
                <?php
                $query_two = "SELECT * from experiences";

                $experiences = mysqli_query($connect, $query_two);

                foreach ($experiences as $experience) {
                    echo "
        <div class='col' style='display: flex; align-items: stretch;'>
        <div class='rounded bg-white p-4 shadow'>
            <div class='exp-icon mx-auto d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white shadow'
                style='width: 64px; height: 64px; transform: translateY(-24px);'>
                " . $experience['svg'] . "
            </div>
            <h1 class='text-dark mb-3 fs-4 fw-medium text-center'>" . $experience['role'] . "</h1>
            <p class='text-muted'><span class='fw-bold'>" . $experience['company'] . "</span></p>
            <p class='text-muted'>" . $experience['location'] . " | " . $experience['timeframe'] . "</p>
            <p class='px-2 text-dark mt-3'>" . $experience['description'] . "</p>
            <p class='px-2 text-muted mt-3'>Contributions included: <br />" . $experience['contributions'] . "</p>
        </div>
    </div>
    ";
                }
                ?>

            </div>
        </div>

        <h2 class="display-4 fw-bold text-secondary text-lowercase ms-4 my-5">
            <a name="educations">Education</a>
        </h2>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4" style="display: flex; flex-wrap: wrap;">
                <?php
                $query_two = "SELECT * from educations";

                $educations = mysqli_query($connect, $query_two);

                foreach ($educations as $education) {
                    echo "
        <div class='col' style='display:flex; align-items:stretch;'>
        <div class='rounded bg-white p-4 shadow'>
            <div class='exp-icon mx-auto d-flex align-items-center justify-content-center rounded-circle bg-secondary text-white shadow'
                style='width: 64px; height: 64px; transform: translateY(-24px);'>
                " . $education['svg'] . "
            </div>
            <h1 class='text-dark mb-3 fs-4 fw-medium text-center'>" . $education['program'] . "</h1>
            <p class='text-muted'><span class='fw-bold'>" . $education['school'] . "</span></p>
            <p class='text-muted'> Graduated " . $education['year'] . "</p>
            <p class='px-2 text-dark mt-3'>" . $education['description'] . "</p>

        </div>
    </div>
    ";
                }
                ?>
            </div>
        </div>
    </section>












    <footer>
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                        <span class="mb-3 mb-md-0 text-body-secondary">&copy; KARScott Codes | portfolio & resume</span>
                    </a>

                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3">
                        <a class="btn btn-secondary" href="https://www.linkedin.com/in/karscottcodes/"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 16h-2v-6h2v6zm-1-6.891c-.607 0-1.1-.496-1.1-1.109 0-.612.492-1.109 1.1-1.109s1.1.497 1.1 1.109c0 .613-.493 1.109-1.1 1.109zm8 6.891h-1.998v-2.861c0-1.881-2.002-1.722-2.002 0v2.861h-2v-6h2v1.093c.872-1.616 4-1.736 4 1.548v3.359z"/></svg>
                        </a>
                    </li>

                    <li class="ms-3">
                        <a class="btn btn-secondary" href="https://github.com/karscottcodes"><svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        </a>
                    </li>

                    <li class="ms-3">
                        <a class="btn btn-secondary" href="https://codepen.io/karscottcodes/"><svg fill="#fff" width="24px" height="24px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M911.7 385.3l-.3-1.5c-.2-1-.3-1.9-.6-2.9-.2-.6-.4-1.1-.5-1.7-.3-.8-.5-1.7-.9-2.5-.2-.6-.5-1.1-.8-1.7-.4-.8-.8-1.5-1.2-2.3-.3-.5-.6-1.1-1-1.6-.8-1.2-1.7-2.4-2.6-3.6-.5-.6-1.1-1.3-1.7-1.9-.4-.5-.9-.9-1.4-1.3-.6-.6-1.3-1.1-1.9-1.6-.5-.4-1-.8-1.6-1.2-.2-.1-.4-.3-.6-.4L531.1 117.8a34.3 34.3 0 0 0-38.1 0L127.3 361.3c-.2.1-.4.3-.6.4-.5.4-1 .8-1.6 1.2-.7.5-1.3 1.1-1.9 1.6-.5.4-.9.9-1.4 1.3-.6.6-1.2 1.2-1.7 1.9-1 1.1-1.8 2.3-2.6 3.6-.3.5-.7 1-1 1.6-.4.7-.8 1.5-1.2 2.3-.3.5-.5 1.1-.8 1.7-.3.8-.6 1.7-.9 2.5-.2.6-.4 1.1-.5 1.7-.2.9-.4 1.9-.6 2.9l-.3 1.5c-.2 1.5-.3 3-.3 4.5v243.5c0 1.5.1 3 .3 4.5l.3 1.5.6 2.9c.2.6.3 1.1.5 1.7.3.9.6 1.7.9 2.5.2.6.5 1.1.8 1.7.4.8.7 1.5 1.2 2.3.3.5.6 1.1 1 1.6.5.7.9 1.4 1.5 2.1l1.2 1.5c.5.6 1.1 1.3 1.7 1.9.4.5.9.9 1.4 1.3.6.6 1.3 1.1 1.9 1.6.5.4 1 .8 1.6 1.2.2.1.4.3.6.4L493 905.7c5.6 3.8 12.3 5.8 19.1 5.8 6.6 0 13.3-1.9 19.1-5.8l365.6-243.5c.2-.1.4-.3.6-.4.5-.4 1-.8 1.6-1.2.7-.5 1.3-1.1 1.9-1.6.5-.4.9-.9 1.4-1.3.6-.6 1.2-1.2 1.7-1.9l1.2-1.5 1.5-2.1c.3-.5.7-1 1-1.6.4-.8.8-1.5 1.2-2.3.3-.5.5-1.1.8-1.7.3-.8.6-1.7.9-2.5.2-.5.4-1.1.5-1.7.3-.9.4-1.9.6-2.9l.3-1.5c.2-1.5.3-3 .3-4.5V389.8c-.3-1.5-.4-3-.6-4.5zM546.4 210.5l269.4 179.4-120.3 80.4-149-99.6V210.5zm-68.8 0v160.2l-149 99.6-120.3-80.4 269.3-179.4zM180.7 454.1l86 57.5-86 57.5v-115zm296.9 358.5L208.3 633.2l120.3-80.4 149 99.6v160.2zM512 592.8l-121.6-81.2L512 430.3l121.6 81.2L512 592.8zm34.4 219.8V652.4l149-99.6 120.3 80.4-269.3 179.4zM843.3 569l-86-57.5 86-57.5v115z"></path> </g></svg>
                        </a>
                    </li>
                </ul>
            </footer>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>