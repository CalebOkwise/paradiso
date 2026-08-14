<?php
require_once __DIR__ . '/includes/functions.php';
ensure_session();
$errors = get_flash('form_errors', []);
$old = $_SESSION['form_old'] ?? [];
clear_old();
$csrfToken = generate_csrf_token();
function old($key, $default = '') {
    global $old;
    return htmlspecialchars($old[$key] ?? $default, ENT_QUOTES);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourLandlady NG | Managed Farmland by Paradiso</title>
    <meta name="description" content="Own genuine farmland through YourLandlady NG, with Paradiso handling farm operations from planting through harvest.">
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', 'YOUR_META_PIXEL_ID');
        fbq('track', 'PageView');
        fbq('track', 'ViewContent');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
             src="https://www.facebook.com/tr?id=YOUR_META_PIXEL_ID&ev=PageView&noscript=1"/>
    </noscript>
</head>
<body>
    <header class="site-header">
        <div class="wrapper header-inner">
            <a href="/" class="brand" aria-label="YourLandlady NG home">
                <img src="assets/images/logo3trimmed.png" alt="YourLandlady NG">
            </a>
            <nav class="header-nav" aria-label="Main navigation">
                <a href="#options">Options</a>
                <a href="#how-it-works">Process</a>
                <a href="#lead-form" class="button button-small">Enquire</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="wrapper hero-grid">
                <div class="hero-copy">
                     <!--  <p class="eyebrow">YourLandlady NG presents Paradiso managed farmland</p> -->
                    <h1>High income is useful. Ownership is what changes the equation.</h1>
                    <p class="hero-description">Use part of the income you already earn to own productive farmland, while Paradiso manages the farm work from planting through harvest.</p>
                    <div class="hero-actions">
                        <a href="#lead-form" class="button">Start a qualified enquiry</a>
                        <a href="#options" class="button button-ghost">View farm options</a>
                    </div>
                    <dl class="hero-stats" aria-label="Key offer details">
                        <div>
                            <dt>From</dt>
                            <dd>&#8358;700K</dd>
                        </div>
                        <div>
                            <dt>Asset</dt>
                            <dd>Farmland</dd>
                        </div>
                        <div>
                            <dt>Operations</dt>
                            <dd>Managed</dd>
                        </div>
                    </dl>
                </div>
                <div class="hero-visual" aria-label="Paradiso farm media preview">
                    <div class="farm-frame farm-frame-large">
                        <div class="farm-art farm-art-hero"></div>
                        <div class="farm-caption">
                            <span>Paradiso Farms</span>
                            <strong>Managed farmland ownership</strong>
                        </div>
                    </div>
                    <div class="video-tile">
                        <span class="play-mark" aria-hidden="true"></span>
                        <p>Farm video slot</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section editorial-strip">
            <div class="wrapper editorial-grid">
                <p class="section-kicker">The conversation from the ad</p>
                <h2>You can be highly paid and still have your future tied too tightly to employment.</h2>
                <p>For senior professionals, the real shift is converting income into assets that can work outside their career. Farmland is the vehicle here; professional management is what makes it realistic.</p>
            </div>
        </section>

        <section class="section problem-section">
            <div class="wrapper split-layout">
                <div>
                    <p class="section-kicker">The gap</p>
                    <h2>Most productive assets demand time you do not have.</h2>
                </div>
                <div class="insight-list">
                    <article>
                        <span>01</span>
                        <p>A strong salary can still leave your financial life dependent on one source.</p>
                    </article>
                    <article>
                        <span>02</span>
                        <p>Farming can be productive, but operations require knowledge, staff, supervision and patience.</p>
                    </article>
                    <article>
                        <span>03</span>
                        <p>Your asset strategy should not quietly become another demanding job.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section solution-section">
            <div class="wrapper feature-layout">
                <div class="farm-frame">
                    <div class="farm-art farm-art-fields"></div>
                </div>
                <div>
                    <p class="section-kicker">How it works</p>
                    <h2>YourLandlady NG connects you to farmland ownership powered by Paradiso operations.</h2>
                    <p class="lead-text">You own genuine farmland. Paradiso manages the farming cycle. YourLandlady NG handles the funnel, enquiry and buyer conversation without pretending to be Paradiso.</p>
                    <div class="feature-list">
                        <article>
                            <strong>Genuine ownership</strong>
                            <p>Ownership can be communicated clearly, with the documentation process handled during the buyer journey.</p>
                        </article>
                        <article>
                            <strong>Professional management</strong>
                            <p>Paradiso manages planting, field work, maintenance and harvest operations.</p>
                        </article>
                        <article>
                            <strong>Built for busy professionals</strong>
                            <p>No farming experience, day-to-day supervision or second business operation is required.</p>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section options-section" id="options">
            <div class="wrapper">
                <div class="section-heading">
                    <p class="section-kicker">Available options</p>
                    <h2>Choose the farmland category that fits your capital range and goals.</h2>
                </div>
                <div class="pricing-grid">
                    <article class="pricing-card pricing-card-featured">
                        <div>
                            <p class="plan-label">Entry option</p>
                            <h3>Food Crop Farmland</h3>
                            <p>Tomato, pepper and sweet potato farmland managed for seasonal production.</p>
                        </div>
                        <ul>
                            <li><strong>&#8358;700,000</strong> per plot</li>
                            <li><strong>&#8358;4,000,000</strong> per acre</li>
                            <li>Management: &#8358;50,000/year per plot</li>
                            <li>Management: &#8358;300,000/year per acre</li>
                        </ul>
                    </article>
                    <article class="pricing-card">
                        <div>
                            <p class="plan-label">Long-term crops</p>
                            <h3>Cocoa & Oil Palm Farmland</h3>
                            <p>Cocoa and oil palm farmland for buyers focused on longer-term agricultural assets.</p>
                        </div>
                        <ul>
                            <li><strong>&#8358;1,000,000</strong> per plot</li>
                            <li><strong>&#8358;6,000,000</strong> per acre</li>
                            <li>Management: &#8358;50,000/year per plot</li>
                            <li>Management: &#8358;300,000/year per acre</li>
                        </ul>
                    </article>
                </div>
                <p class="risk-note">Returns are not presented as guaranteed. Final conversations should rely only on verified Paradiso documents, farm records and buyer agreements.</p>
            </div>
        </section>

        <section class="section proof-section">
            <div class="wrapper">
                <div class="media-grid">
                    <div class="media-copy">
                        <p class="section-kicker">Proof before persuasion</p>
                        <h2>Use real Paradiso farm photos, videos and buyer proof here.</h2>
                        <p>These slots are intentionally structured for genuine farm media. Replace the visual placeholders with Paradiso photographs, field videos, ownership documents or approved testimonials when available.</p>
                    </div>
                    <div class="farm-frame"><div class="farm-art farm-art-close"></div></div>
                    <div class="farm-frame"><div class="farm-art farm-art-palm"></div></div>
                    <div class="proof-card">
                        <h3>Credibility checklist</h3>
                        <ul>
                            <li>Real farm footage</li>
                            <li>Actual field progress</li>
                            <li>Clear ownership process</li>
                            <li>Verified testimonials only</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="section objections-section">
            <div class="wrapper">
                <div class="section-heading narrow">
                    <p class="section-kicker">Common concerns</p>
                    <h2>Designed for people who want ownership, not extra operational work.</h2>
                </div>
                <div class="objection-grid">
                    <article>
                        <h3>No farming experience?</h3>
                        <p>Paradiso handles the farming operations, crop planning and field execution.</p>
                    </article>
                    <article>
                        <h3>No time?</h3>
                        <p>The model is structured around professional management and periodic updates.</p>
                    </article>
                    <article>
                        <h3>Do not want another business?</h3>
                        <p>You are not being asked to recruit labour, buy inputs or supervise daily activity.</p>
                    </article>
                    <article>
                        <h3>Need clarity before paying?</h3>
                        <p>The enquiry process qualifies your goals before documentation and payment steps begin.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section process-section" id="how-it-works">
            <div class="wrapper">
                <div class="section-heading narrow">
                    <p class="section-kicker">Buyer journey</p>
                    <h2>A simple process from enquiry to managed farm ownership.</h2>
                </div>
                <div class="process-grid">
                    <article>
                        <span>1</span>
                        <h3>Submit enquiry</h3>
                        <p>Share your capital range, preferred crop category, goal and timeline.</p>
                    </article>
                    <article>
                        <span>2</span>
                        <h3>Get matched</h3>
                        <p>A specialist follows up with the relevant farmland option and next documentation steps.</p>
                    </article>
                    <article>
                        <span>3</span>
                        <h3>Complete ownership</h3>
                        <p>Once satisfied, you move through the ownership and payment process.</p>
                    </article>
                    <article>
                        <span>4</span>
                        <h3>Paradiso manages</h3>
                        <p>Farm operations begin while you receive updates through the agreed process.</p>
                    </article>
                </div>
            </div>
        </section>

        <section class="section form-section" id="lead-form">
            <div class="wrapper form-layout">
                <div class="form-aside">
                    <p class="section-kicker">Qualified enquiry</p>
                    <h2>Tell us what kind of farmland ownership makes sense for you.</h2>
                    <p>The form is short by design. It helps the team avoid generic follow-up and focus on fit, timeline and seriousness.</p>
                    <div class="form-trust">
                        <span>Private follow-up</span>
                        <span>No public investment claims</span>
                        <span>Lead event after submission only</span>
                    </div>
                </div>

                <div class="form-panel">
                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-error">
                            <strong>Please fix the following items:</strong>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li><?php echo htmlspecialchars($error, ENT_QUOTES); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form id="leadCaptureForm" class="multi-step-form" action="submit-lead.php" method="post" novalidate>
                        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                        <input type="hidden" name="utm_source" id="utm_source" value="<?php echo old('utm_source'); ?>">
                        <input type="hidden" name="utm_medium" id="utm_medium" value="<?php echo old('utm_medium'); ?>">
                        <input type="hidden" name="utm_campaign" id="utm_campaign" value="<?php echo old('utm_campaign'); ?>">
                        <input type="hidden" name="utm_content" id="utm_content" value="<?php echo old('utm_content'); ?>">
                        <input type="hidden" name="utm_term" id="utm_term" value="<?php echo old('utm_term'); ?>">
                        <input type="hidden" name="fbclid" id="fbclid" value="<?php echo old('fbclid'); ?>">
                        <input type="hidden" name="page_url" id="page_url" value="<?php echo htmlspecialchars($_SERVER['REQUEST_URI'], ENT_QUOTES); ?>">
                        <input type="hidden" name="referrer" id="referrer" value="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER'] ?? '', ENT_QUOTES); ?>">
                        <input type="hidden" id="form_start" name="form_start" value="<?php echo time(); ?>">
                        <div class="honeypot">
                            <label for="company_name">Company name</label>
                            <input type="text" id="company_name" name="company_name" autocomplete="off" tabindex="-1">
                        </div>

                        <div class="form-progress" aria-hidden="true">
                            <span class="active"></span>
                            <span></span>
                            <span></span>
                        </div>

                        <div class="step active" data-step="1">
                            <div class="step-heading">
                                <span>Step 1 of 3</span>
                                <h3>Contact details</h3>
                            </div>
                            <div class="form-grid">
                                <label>
                                    Full name
                                    <input type="text" name="full_name" value="<?php echo old('full_name'); ?>" required>
                                </label>
                                <label>
                                    Phone / WhatsApp
                                    <input type="tel" name="phone_whatsapp" value="<?php echo old('phone_whatsapp'); ?>" required>
                                </label>
                                <label>
                                    Email address
                                    <input type="email" name="email" value="<?php echo old('email'); ?>" required>
                                </label>
                            </div>
                            <div class="step-actions">
                                <button type="button" class="button" data-action="next">Continue</button>
                            </div>
                        </div>

                        <div class="step" data-step="2">
                            <div class="step-heading">
                                <span>Step 2 of 3</span>
                                <h3>Ownership fit</h3>
                            </div>
                            <div class="form-grid">
                                <label>
                                    Investment range
                                    <select name="investment_range" required>
                                        <option value="">Select range</option>
                                        <option value="700K-1M" <?php echo old('investment_range') === '700K-1M' ? 'selected' : ''; ?>>&#8358;700K - &#8358;1M</option>
                                        <option value="1M-3M" <?php echo old('investment_range') === '1M-3M' ? 'selected' : ''; ?>>&#8358;1M - &#8358;3M</option>
                                        <option value="3M-5M" <?php echo old('investment_range') === '3M-5M' ? 'selected' : ''; ?>>&#8358;3M - &#8358;5M</option>
                                        <option value="5M-10M" <?php echo old('investment_range') === '5M-10M' ? 'selected' : ''; ?>>&#8358;5M - &#8358;10M</option>
                                        <option value="10M+" <?php echo old('investment_range') === '10M+' ? 'selected' : ''; ?>>&#8358;10M+</option>
                                        <option value="Still exploring" <?php echo old('investment_range') === 'Still exploring' ? 'selected' : ''; ?>>Still exploring</option>
                                    </select>
                                </label>
                                <label>
                                    Preferred farmland
                                    <select name="farmland_interest" required>
                                        <option value="">Select interest</option>
                                        <option value="Food crops" <?php echo old('farmland_interest') === 'Food crops' ? 'selected' : ''; ?>>Food crops</option>
                                        <option value="Cocoa" <?php echo old('farmland_interest') === 'Cocoa' ? 'selected' : ''; ?>>Cocoa</option>
                                        <option value="Oil palm" <?php echo old('farmland_interest') === 'Oil palm' ? 'selected' : ''; ?>>Oil palm</option>
                                        <option value="All" <?php echo old('farmland_interest') === 'All' ? 'selected' : ''; ?>>All</option>
                                        <option value="Not sure" <?php echo old('farmland_interest') === 'Not sure' ? 'selected' : ''; ?>>Not sure</option>
                                    </select>
                                </label>
                                <label>
                                    Primary goal
                                    <select name="primary_goal" required>
                                        <option value="">Select goal</option>
                                        <option value="Build another potential source of income" <?php echo old('primary_goal') === 'Build another potential source of income' ? 'selected' : ''; ?>>Build another potential source of income</option>
                                        <option value="Build productive assets" <?php echo old('primary_goal') === 'Build productive assets' ? 'selected' : ''; ?>>Build productive assets</option>
                                        <option value="Diversify investments" <?php echo old('primary_goal') === 'Diversify investments' ? 'selected' : ''; ?>>Diversify investments</option>
                                        <option value="Build long-term wealth" <?php echo old('primary_goal') === 'Build long-term wealth' ? 'selected' : ''; ?>>Build long-term wealth</option>
                                        <option value="Own tangible assets" <?php echo old('primary_goal') === 'Own tangible assets' ? 'selected' : ''; ?>>Own tangible assets</option>
                                        <option value="Still exploring" <?php echo old('primary_goal') === 'Still exploring' ? 'selected' : ''; ?>>Still exploring</option>
                                    </select>
                                </label>
                                <label>
                                    Timeline
                                    <select name="timeline" required>
                                        <option value="">Select timeline</option>
                                        <option value="Ready" <?php echo old('timeline') === 'Ready' ? 'selected' : ''; ?>>Ready</option>
                                        <option value="Within 30 days" <?php echo old('timeline') === 'Within 30 days' ? 'selected' : ''; ?>>Within 30 days</option>
                                        <option value="1-3 months" <?php echo old('timeline') === '1-3 months' ? 'selected' : ''; ?>>1-3 months</option>
                                        <option value="3-6 months" <?php echo old('timeline') === '3-6 months' ? 'selected' : ''; ?>>3-6 months</option>
                                        <option value="Just researching" <?php echo old('timeline') === 'Just researching' ? 'selected' : ''; ?>>Just researching</option>
                                    </select>
                                </label>
                            </div>
                            <div class="step-actions">
                                <button type="button" class="button button-ghost" data-action="back">Back</button>
                                <button type="button" class="button" data-action="next">Continue</button>
                            </div>
                        </div>

                        <div class="step" data-step="3">
                            <div class="step-heading">
                                <span>Step 3 of 3</span>
                                <h3>Submit enquiry</h3>
                            </div>
                            <div class="review-card">
                                <p>Your enquiry will be stored securely with the attribution data from the ad click, then a specialist can follow up with the relevant Paradiso farm option.</p>
                            </div>
                            <div class="step-actions">
                                <button type="button" class="button button-ghost" data-action="back">Back</button>
                                <button type="submit" class="button">Submit enquiry</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="wrapper footer-inner">
            <p>&copy; <?php echo date('Y'); ?> YourLandlady NG. Paradiso Farms is the featured managed farmland product.</p>
            <p>We use your details only to respond to this enquiry.</p>
        </div>
    </footer>

    <noscript>
        <style>
            .step { display: block !important; }
            .step-actions { display: flex; }
        </style>
    </noscript>
    <script src="assets/js/tracking.js"></script>
    <script src="assets/js/form.js"></script>
</body>
</html>
