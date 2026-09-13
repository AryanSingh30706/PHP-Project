<?php
include('header.php');
include('connect.php');

$did = $_GET['did'];
$dname = $_GET['dname'];
$query = "SELECT * FROM `tbl_package` WHERE did=$did";
$res = mysqli_query($con, $query);

$count = 0;
$count = mysqli_num_rows($res);

$pack = array();
if ($count > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $pack[] = $row;
    }
}
?>

<style>
    /* All rules below are scoped to .pkgc- prefixed classes so they cannot
       collide with the AtlasGo admin theme's own .container/.card/.grid/etc. */

    .pkgc-wrap {
        --pkgc-ink: #16323A;
        --pkgc-teal: #1F4E52;
        /* --pkgc-sand: #F4EEE1; */
        --pkgc-paper: #FBF8F1;
        --pkgc-brass: #B98B3E;
        --pkgc-coral: #D9573B;
        --pkgc-sage: #8FA98C;
        --pkgc-line: rgba(244, 238, 225, 0.28);

        background: var(--pkgc-sand);
        font-family: 'Inter', sans-serif;
        color: var(--pkgc-ink);
        padding: 1rem 1.5rem 2rem;
        border-radius: 12px;
    }

    .pkgc-wrap *,
    .pkgc-wrap *::before,
    .pkgc-wrap *::after {
        box-sizing: border-box;
    }

    .pkgc-head {
        max-width: 1180px;
        margin: 0 auto 2.5rem;
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .pkgc-eyebrow {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--pkgc-brass);
        margin: 0 0 0.4rem;
    }

    .pkgc-head h1 {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 2.4rem;
        margin: 0 0 0.4rem;
        letter-spacing: -0.01em;
        color: var(--pkgc-ink);
    }

    .pkgc-head p {
        margin: 0;
        color: var(--pkgc-teal);
        font-size: 0.95rem;
    }

    .pkgc-add-btn {
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
        font-weight: 500;
        background: var(--pkgc-ink);
        color: var(--pkgc-paper);
        border: none;
        padding: 0.7rem 1.2rem;
        border-radius: 8px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        white-space: nowrap;
    }

    .pkgc-add-btn:hover {
        background: var(--pkgc-teal);
        color: var(--pkgc-paper);
    }

    .pkgc-flash {
        max-width: 1180px;
        margin: 0 auto 1.5rem;
        background: var(--pkgc-paper);
        border: 1px solid var(--pkgc-sage);
        color: var(--pkgc-teal);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.8rem;
        padding: 0.7rem 1rem;
        border-radius: 8px;
    }

    .pkgc-grid {
        max-width: 1180px;
        width: 100%;
        min-width: 0;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 1.75rem;
        perspective: 1600px;
    }

    @media (max-width:980px) {
        .pkgc-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }

    @media (max-width:640px) {
        .pkgc-grid {
            grid-template-columns: minmax(0, 1fr);
        }
    }

    .pkgc-flip {
        position: relative;
        height: 400px;
        min-width: 0;
    }

    .pkgc-flip-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: left;
        transition: transform .6s cubic-bezier(.175, .885, .32, 1.1);
        transform-style: preserve-3d;
    }

    .pkgc-flip:hover .pkgc-flip-inner,
    .pkgc-flip:focus-within .pkgc-flip-inner {
        transform: rotateY(180deg);
    }

    .pkgc-face {
        position: absolute;
        inset: 0;
        backface-visibility: hidden;
        border-radius: 14px;
        overflow: hidden;
        pointer-events: none;
    }

    .pkgc-flip .pkgc-front {
        pointer-events: auto;
    }

    .pkgc-flip:hover .pkgc-front,
    .pkgc-flip:focus-within .pkgc-front {
        pointer-events: none;
    }

    .pkgc-flip:hover .pkgc-back,
    .pkgc-flip:focus-within .pkgc-back {
        pointer-events: auto;
    }

    /* ---------- FRONT ---------- */
    .pkgc-front {
        background-color: var(--pkgc-teal);
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 1.1rem;
    }

    .pkgc-front::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(22, 50, 58, 0.15) 0%, rgba(22, 50, 58, 0.1) 40%, rgba(22, 50, 58, 0.88) 100%);
        z-index: 0;
    }

    .pkgc-front>* {
        position: relative;
        z-index: 1;
        min-width: 0;
    }

    .pkgc-id-row {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
    }

    .pkgc-pill {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.68rem;
        letter-spacing: 0.04em;
        background: rgba(251, 248, 241, 0.92);
        color: var(--pkgc-ink);
        padding: 0.3rem 0.6rem;
        border-radius: 20px;
        white-space: nowrap;
    }

    .pkgc-pill.pkgc-dest {
        background: rgba(185, 139, 62, 0.92);
        color: var(--pkgc-paper);
    }

    .pkgc-front-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 2rem;
        color: var(--pkgc-paper);
        line-height: 1.15;
        margin: 0 0 0.15rem;
        overflow-wrap: normal;
        word-break: normal;
    }

    .pkgc-front-sub {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 1rem;
        color: white;
        opacity: 0.85;
        margin: 0;
    }



    /* ---------- BACK ---------- */
    .pkgc-back {
        transform: rotateY(180deg);
        background: var(--pkgc-ink);
        color: var(--pkgc-sand);
        padding: 1.1rem 1.2rem 1.2rem;
        display: flex;
        flex-direction: column;
    }

    .pkgc-back-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.6rem;
        gap: 0.5rem;
    }

    .pkgc-back-title {
        font-family: 'Fraunces', serif;
        font-weight: 600;
        font-size: 1.2rem;
        margin: 0 0 0.15rem;
        color: var(--pkgc-paper);
    }

    .pkgc-type-tag {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.65rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: var(--pkgc-sage);
        margin: 0;
    }

    .pkgc-price {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 1.1rem;
        font-weight: 500;
        color: var(--pkgc-coral);
        white-space: nowrap;
    }

    .pkgc-desc {
        font-size: 0.8rem;
        line-height: 1.5;
        color: white;
        opacity: 0.85;
        margin: 0 0 0.7rem;
        overflow: hidden;
        display: -webkit-box;
        /* -webkit-line-clamp: 4; */
        -webkit-box-orient: vertical;
    }

    .pkgc-stub {
        position: relative;
        border-top: 1.5px dashed var(--pkgc-line);
        padding-top: 0.65rem;
        margin-top: auto;
    }

    .pkgc-ticket-fields {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.5rem;
        margin-bottom: 0.75rem;
    }

    .pkgc-tf-label {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.6rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        color: var(--pkgc-sage);
        margin: 0 0 0.15rem;
    }

    .pkgc-tf-value {
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.78rem;
        color: var(--pkgc-paper);
        margin: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .pkgc-actions {
        display: flex;
        gap: 5px;
    }

    .pkgc-actions a {
        flex: 1;
        text-align: center;
        font-family: 'Inter', sans-serif;
        font-size: 0.78rem;
        font-weight: 500;
        padding: 0.55rem 0.5rem;
        border-radius: 8px;
        border: 1px solid var(--pkgc-line);
        cursor: pointer;
        transition: transform .15s ease, background .15s ease;
        text-decoration: none;
    }

    .pkgc-actions a:active {
        transform: scale(0.97);
    }

    .pkgc-btn-edit {
        background: var(--pkgc-brass);
        color: var(--pkgc-ink);
        border-color: var(--pkgc-brass);
    }

    .pkgc-btn-edit:hover {
        background: #a67a34;
        color: var(--pkgc-ink);
    }

    .pkgc-btn-delete {
        background: transparent;
        color: var(--pkgc-coral);
        border-color: var(--pkgc-coral);
    }

    .pkgc-btn-delete:hover {
        background: rgba(217, 87, 59, 0.12);
        color: var(--pkgc-coral);
    }

    .pkgc-empty-state {
        max-width: 1180px;
        margin: 0 auto;
        text-align: center;
        padding: 3rem 1rem;
        color: var(--pkgc-teal);
        font-family: 'IBM Plex Mono', monospace;
        font-size: 0.85rem;
    }
</style>

<body>
    <div style="
    background-color: #303954;
    border: 0px solid transparent;
    width: 100%;
    height: 100px;">
    </div>

    <!-- Page Title / Inner Hero Banner -->
    <div class="breadcumb-wrapper my-5" data-bg-src="images/pack_filter_back.jpeg" style="padding: 180px 0 100px; background-size: cover; background-position: center; position: relative; border-radius: 20px; margin: 20px; overflow: hidden; border: 1px solid transparent;">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title text-white fw-bold mb-3"></i>AtlasGo - Destinations</h1>
                <ul class="breadcumb-menu list-inline text-white">
                    <li class="list-inline-item"><a href="home.php" class="text-white">Home</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item"><a href="destination.php" class="text-white">Destination</a></li>
                    <li class="list-inline-item me-2">/</li>
                    <li class="list-inline-item active text-white-50">Filtered Packages</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <div class="title-area text-center mb-5">
                <span class="sub-title">Filtered Packages</span>
                <h2 class="sec-title">Packages for '<?php echo $dname ?>'</h2>
            </div>
        </div>
    </div>

    <section class="space position-relative overflow-hidden" id="packages-sec">
        <div class="container">
            <div>
                <div class="card-body">
                    <div class="pkgc-wrap">
                        <div class="pkgc-grid">
                            <?php
                            $i = 1;
                            foreach ($pack as $p) {
                            ?>
                                <div class="pkgc-flip" tabindex="0">
                                    <div class="pkgc-flip-inner">
                                        <div class="pkgc-face pkgc-front" style="background-image:url('<?php echo $p['pic']; ?>')">
                                            <div class="pkgc-id-row">
                                                <span class="pkgc-pill"><?php echo $i++; ?></span>
                                                <!-- <span class="pkgc-pill pkgc-dest">DID-<?php echo $p['did']; ?></span> -->
                                            </div>
                                            <div>
                                                <h2 class="pkgc-front-title"><?php echo $p['pname']; ?></h2>
                                                <p class="pkgc-front-sub"><?php echo $p['type']; ?></p>
                                                <!-- <p class="pkgc-hover-hint">hover / tap to manage →</p> -->
                                            </div>
                                        </div>
                                        <div class="pkgc-face pkgc-back">
                                            <div class="pkgc-back-top">
                                                <div>
                                                    <h3 class="pkgc-back-title"><?php echo $p['pname']; ?></h3>
                                                    <p class="pkgc-type-tag"><?php echo $p['type']; ?></p>
                                                </div>
                                                <span class="pkgc-price">₹<?php echo $p['price']; ?></span>
                                            </div>
                                            <p class="pkgc-desc"><?php echo $p['description']; ?></p>
                                            <div class="pkgc-stub">
                                                <div class="pkgc-ticket-fields">
                                                    <div>
                                                        <p class="pkgc-tf-label">People</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['no_of_people']; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="pkgc-tf-label">Date</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['date']; ?></p>
                                                    </div>
                                                    <div>
                                                        <p class="pkgc-tf-label">Time</p>
                                                        <p class="pkgc-tf-value"><?php echo $p['time']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="pkgc-actions">
                                                    <a href="package_info.php?id=<?php echo $p['pid']; ?>" class="pkgc-btn-edit"> More Info </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

</body>

<?php
include('footer.php');
?>