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
                <a class="navbar-brand fw-bold text-danger fs-4" href="#!">MECHASHOP</a>
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
        
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Trải nghiệm đam mê lắp ráp</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Cung cấp các dòng mô hình Gunpla chính hãng Bandai</p>
                </div>
            </div>
        </header>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    
                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://placehold.co/450x300/e9ecef/495057?text=HG+Aerial" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">HG 1/144 Gundam Aerial</h5>
                                    <span class="text-danger fw-bold">350.000 VNĐ</span>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">HOT</div>
                            <img class="card-img-top" src="https://placehold.co/450x300/e9ecef/495057?text=MG+Barbatos" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">MG 1/100 Barbatos</h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-danger fw-bold">1.150.000 VNĐ</span>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="#"><i class="bi-cart-plus"></i> Thêm vào giỏ</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                            <img class="card-img-top" src="https://placehold.co/450x300/e9ecef/495057?text=RG+Sazabi" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">RG 1/144 Sazabi</h5>
                                    <span class="text-muted text-decoration-line-through">1.200.000 VNĐ</span><br>
                                    <span class="text-danger fw-bold">950.000 VNĐ</span>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="#"><i class="bi-cart-plus"></i> Thêm vào giỏ</a></div>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-5">
                        <div class="card h-100">
                            <img class="card-img-top" src="https://placehold.co/450x300/e9ecef/495057?text=PG+Unleashed" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">PG Unleashed RX-78-2</h5>
                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                    <span class="text-danger fw-bold">7.500.000 VNĐ</span>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-danger mt-auto" href="#"><i class="bi-cart-plus"></i> Thêm vào giỏ</a></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Mechashop 2026. Đồ án Web nâng cao.</p></div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>