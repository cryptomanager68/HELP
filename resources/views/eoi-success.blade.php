<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />
    <link href="{{ asset('landingPage/css/style.css') }}" rel="stylesheet" />
    <title>Expression of Interest Submitted</title>
</head>
<body>
    <header class="header">
      <div class="container">
        <div class="header__wrapper">
          <a class="c-link" href="/">
            <div class="c-logo">
              <img src="{{ asset('logo.jpg') }}" alt="Logo" class="c-logo__img" style="border-radius:100%" />
            </div>
          </a>
        </div>
      </div>
    </header>

    <main>
      <section class="section">
        <div class="container">
          <div style="max-width: 700px; margin: 0 auto; text-align: center; padding: 3rem 0;">
            <div style="background: #d4edda; padding: 2rem; border-left: 4px solid #28a745; margin-bottom: 2rem;">
              <h1 class="heading heading--1" style="color: #155724;">Thank You!</h1>
              <h3 class="heading heading--3" style="color: #155724; margin-top: 1rem;">
                Your Expression of Interest has been submitted successfully.
              </h3>
            </div>

            <p class="c-paragraph" style="font-size: 1.1rem; margin-bottom: 1.5rem;">
              We have received your expression of interest. A member of our team will be in contact with you shortly.
            </p>

            <div style="background: #fff3cd; padding: 1.5rem; border-left: 4px solid #ffc107; margin: 2rem 0; text-align: left;">
              <h4 class="heading heading--4" style="color: #856404;">Important Reminder</h4>
              <p class="c-paragraph" style="margin-top: 1rem;">
                Before any participation, you must obtain independent professional advice from qualified accountants and lawyers. 
                No financial, investment, lending, or credit advice has been provided through this platform.
              </p>
            </div>

            <div style="margin-top: 3rem;">
              <a href="/" class="c-button c-button--primary" style="color:white; text-decoration:none; display: inline-block; padding: 1rem 2rem;">
                Return to Homepage
              </a>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="container">
        <div class="c-footer">
          <div class="c-footer__box">
            <a class="c-link" href="/">
              <div class="c-logo">
                <img src="{{ asset('logo.jpg') }}" alt="Logo" class="c-logo__img" style="border-radius:100%" />
              </div>
            </a>
            <p class="c-paragraph c-footer__text">
              © <?php echo date('Y'); ?> Homeowners Equity & Liquidity Plan. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
</body>
</html>
