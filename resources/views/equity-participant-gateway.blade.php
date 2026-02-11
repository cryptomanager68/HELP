<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Hind:wght@600&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet" />
    <link href="{{ asset('landingPage/css/style.css') }}" rel="stylesheet" />
    <title>Equity Participant Gateway</title>
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
          <nav class="c-nav">
            <input id="dropdown" class="c-nav__toggle" type="checkbox" />
            <div class="c-nav__content">
              <ul class="c-list c-list--flex">
                <li class="c-list__item">
                  <a href="/" class="c-link c-link--list">Home</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>

    <main>
      <section class="section">
        <div class="container">
          <div class="section__title-wrapper">
            <h1 class="heading heading--1">Equity Participant Gateway</h1>
            <h4 class="heading heading--4">
              This gateway is for property owners who wish to explore using their equity to participate in property development syndicates.
            </h4>
          </div>

          <div style="background: #fff3cd; padding: 2rem; border-left: 4px solid #ffc107; margin: 2rem 0;">
            <h3 class="heading heading--3" style="color: #856404;">Before You Proceed</h3>
            <p class="c-paragraph" style="margin-top: 1rem;">
              <strong>You must read and understand the following:</strong>
            </p>
            <ul style="list-style: disc; margin-left: 2rem; margin-top: 1rem;">
              <li class="c-paragraph">No financial, investment, lending, or credit advice is provided</li>
              <li class="c-paragraph">All participation is voluntary and at your own discretion</li>
              <li class="c-paragraph">Independent professional advice is mandatory before proceeding</li>
              <li class="c-paragraph">Equity assessment is conducted by third-party financiers only</li>
              <li class="c-paragraph">Each opportunity is project-specific and stands alone</li>
            </ul>
          </div>

          <div style="margin-top: 3rem;">
            <h2 class="heading heading--2">Expression of Interest Form</h2>
            <p class="c-paragraph" style="margin-top: 1rem;">
              Complete the form below to register your interest. This is not an application or commitment.
            </p>

            <form action="{{ route('eoi.submit') }}" method="POST" style="margin-top: 2rem; max-width: 600px;">
              @csrf
              <input type="hidden" name="participant_type" value="equity_participant">

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Full Name *</label>
                <input type="text" name="full_name" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Mobile Number *</label>
                <input type="tel" name="mobile_number" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Best Time to Call</label>
                <input type="text" name="best_time_to_call" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Email Address *</label>
                <input type="email" name="email_address" required style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">General Location (Suburb / Region only)</label>
                <input type="text" name="general_location" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Approximate Equity Available (if known)</label>
                <input type="text" name="approximate_equity" style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 4px;">
              </div>

              <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 4px; margin-bottom: 1.5rem;">
                <h4 class="heading heading--4">Mandatory Acknowledgements</h4>
                <div style="margin-top: 1rem;">
                  <label style="display: flex; align-items: start; margin-bottom: 0.75rem;">
                    <input type="checkbox" name="acknowledgement_1" required style="margin-right: 0.5rem; margin-top: 0.25rem;">
                    <span>I acknowledge that no financial, legal, or tax advice is provided</span>
                  </label>
                  <label style="display: flex; align-items: start; margin-bottom: 0.75rem;">
                    <input type="checkbox" name="acknowledgement_2" required style="margin-right: 0.5rem; margin-top: 0.25rem;">
                    <span>I acknowledge that no recommendation has been made regarding participation</span>
                  </label>
                  <label style="display: flex; align-items: start; margin-bottom: 0.75rem;">
                    <input type="checkbox" name="acknowledgement_3" required style="margin-right: 0.5rem; margin-top: 0.25rem;">
                    <span>I acknowledge that any structure or outcome is determined independently by me</span>
                  </label>
                  <label style="display: flex; align-items: start;">
                    <input type="checkbox" name="acknowledgement_4" required style="margin-right: 0.5rem; margin-top: 0.25rem;">
                    <span>I will seek my own professional advice before proceeding</span>
                  </label>
                </div>
              </div>

              <button type="submit" class="c-button c-button--primary" style="width: 100%; padding: 1rem; font-size: 1.1rem;">
                Submit Expression of Interest
              </button>
            </form>
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
