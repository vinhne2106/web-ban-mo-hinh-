<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Mechashop - Đồ án Web bán mô hình Gundam" />
        <meta name="author" content="Nguyễn Thế Vinh" />
        <title>Mechashop - Thế giới mô hình Gundam</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <style>
            /* Custom banner background */
            header.bg-dark {
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://placehold.co/1200x400/1a1a1a/dc3545?text=MECHASHOP+GUNDAM') center center no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand d-flex align-items-center fw-bold text-uppercase" href="#!" style="letter-spacing: 1px;">
    <svg width="38" height="38" viewBox="0 0 44 44" xmlns="http://www.w3.org/2000/svg" class="me-2">
        <rect width="44" height="44" rx="8" fill="#F97316"/>
        <path d="M10 30 L10 18 Q10 10 22 10 Q34 10 34 18 L34 30 Z" fill="#1a1a1a"/>
        <rect x="10" y="27" width="24" height="5" rx="2" fill="#F97316"/>
        <rect x="14" y="17" width="6" height="4" rx="1" fill="#F97316"/>
        <rect x="24" y="17" width="6" height="4" rx="1" fill="#F97316"/>
        <rect x="18" y="24" width="8" height="2" rx="1" fill="#F97316"/>
    </svg>
    <span class="text-dark">MECHA</span><span style="color:#F97316">SHOP</span>
</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Giới thiệu</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Danh mục</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Tất cả sản phẩm</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">High Grade (HG)</a></li>
                                <li><a class="dropdown-item" href="#!">Real Grade (RG)</a></li>
                                <li><a class="dropdown-item" href="#!">Master Grade (MG)</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Tìm mô hình (VD: Exia)..." aria-label="Search">
                        <button class="btn btn-outline-danger" type="submit"><i class="bi bi-search"></i></button>
                    </form>

                    <form class="d-flex me-3">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Giỏ hàng
                            <span class="badge bg-danger text-white ms-1 rounded-pill">3</span>
                        </button>
                    </form>

                    <div class="d-flex">
                        <a href="#" class="btn btn-dark btn-sm me-2">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </nav>