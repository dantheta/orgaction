<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content_top']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['content_bottom']: Items for the header region.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="page-wrapper">

  <div id="page">
    <?php if ($page['top_bar']): ?>
      <div id="top_bar">
        <div class="section middle clearfix">
          <?php print render($page['top_bar']); ?>
        </div>
      </div>
    <?php endif; ?>

    <header id="header" role="banner">

      <div class="section middle clearfix">

      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>


      <?php print render($page['header']); ?>

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation">
          <h2 class="element-invisible"><?php echo t('Main menu'); ?></h2>
          <?php $main_menu_output = menu_tree_output(menu_tree_all_data('main-menu')); ?>
          <?php echo drupal_render($main_menu_output); ?>
        </nav><!-- /#navigation -->
      <?php endif; ?>

      </div><!-- /.section -->

    </header><!-- /#header -->

  <?php if ($page['banner']): ?>
    <div id="banner">
      <div class="section middle clearfix">
        <?php print render($page['banner']); ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($page['featured']): ?>
    <div id="featured"><div class="section middle clearfix">
      <?php print render($page['featured']); ?>
    </div></div> <!-- /.section, /#featured -->
  <?php endif; ?>
  <?php if ($messages): ?>
    <div id="messages"><div class="section middle clearfix">
      <?php print $messages; ?>
    </div></div> <!-- /.section, /#messages -->
  <?php endif; ?>
  <div id="main-wrapper">

    <div id="main" class="clearfix middle">
        <?php if ($breadcrumb): ?>
          <div id="breadcrumb"><?php print $breadcrumb; ?></div>
        <?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <div id="headerwrap"><h1 class="title" id="page-title"><?php print $title; ?></h1></div>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

      <div id="content" class="column" role="main">
        <div class="section">

        <?php if ($tabs && !morelesszen_tabs_float()): ?>
          <div class="tabs"><?php print render($tabs); ?></div>
        <?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>

        <?php print render($page['content_top']); ?>
        <?php print render($page['content']); ?>
        <?php print render($page['content_bottom']); ?>

        <?php print $feed_icons; ?>
        </div><!-- /.section -->
      </div><!-- /#content -->

      <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" class="column sidebar" role="complementary">
          <div class="section">
          <?php print render($page['sidebar_first']); ?>
          </div><!-- /.section -->
        </aside><!-- /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" class="column sidebar" role="complementary">
          <div class="section">
          <?php print render($page['sidebar_second']); ?>
          </div><!-- /.section -->
        </aside><!-- /#sidebar-second -->
      <?php endif; ?>

    </div><!-- /#main -->
  </div><!-- /#main-wrapper -->


  <?php if ($page['bottom']): ?>
  <div id="bottom">
    <div class="section middle">
      <div id="bottom-wrapper" class="clearfix">
        <div class="section">
        <?php print render($page['bottom']); ?>
        </div><!-- /.section -->
      </div><!-- /#bottom-wrapper -->
    </div><!-- /.section -->
  </div><!-- /#footer -->
  <?php endif; ?>


  <?php /* if($page['footer'] || $secondary_menu): ?>

  <footer id="footer" role="contentinfo">

    <div class="section middle">
    
       <?php if ($secondary_menu): ?>
      <nav id="secondary-menu" role="navigation">
        <h2 class="element-invisible"><?php echo t('Secondary menu'); ?></h2>
        <?php echo render($secondary_menu); ?>
      </nav> <!-- /#secondary-menu -->
    <?php endif; ?>

      <?php if($page['footer']): ?>
      <div id="footer-wrapper" class="clearfix">
        <div class="section">
          <?php print render($page['footer']); ?>
        </div><!-- /.section -->
      </div><!-- /#footer-wrapper -->
      <?php endif; ?>

    </div><!-- /.section -->

  </footer><!-- /#footer -->

  <?php endif; */ ?>
  <div id="footer-wrapper">
  <footer id="footer" role="contentinfo" class="middle">

     <div class="two columns" style="
	    clear: left;
	">Who</div>
		<div class="fourteen columns">
			<p>Open Rights Group exists to preserve and promote your rights in the digital age. We are funded by thousands of people like you. We are based in London, United Kingdom. Open Rights is a non-profit company limited by Guarantee, registered in England
				and Wales no. <a href="http://data.companieshouse.gov.uk/doc/company/05581537" rel="noreferrer">05581537</a>.</p>
		</div>
		<div class="two columns">Phone & Address</div>
		<div class="fourteen columns">
  <p><a href="tel:+442070961079">+442070961079</a>
    <br>Unit 7, Tileyard Acorn Studios, 103-105, Blundell Street, London, N7 9BN</p>
		</div>

		<div class="two columns">Site</div>
		<div class="fourteen columns footerLinks">
			<p class="caps">
				<a href="https://www.openrightsgroup.org/about/">About</a> /
				<a href="https://www.openrightsgroup.org/jobs/">Jobs</a> /
				<a href="https://www.openrightsgroup.org/contact/">Contact</a> /
				<a href="https://www.openrightsgroup.org/press/">Press</a> /
				<a href="https://www.openrightsgroup.org/privacy/">Privacy</a> /
				<a href="https://www.openrightsgroup.org/licence/">Licence</a>
			</p>
		</div>

		<div class="two columns">ORG</div>
		<div class="fourteen columns">
			<p class="caps">
				<a href="https://www.openrightsgroup.org/join/">Join</a> /
				<a href="https://www.openrightsgroup.org/donate/">Donate</a> /
				<a href="https://www.openrightsgroup.org/blog/">Blog</a> /
				<a href="https://openrightsgroup.spreadshirt.net/" rel="noreferrer">Shop</a> / <a href="https://www.openrightsgroup.org/press/">Press</a> / <a href="https://www.openrightsgroup.org/events/">Events</a> /
				<a href="https://wiki.openrightsgroup.org/wiki/Main_Page">Wiki</a>
			</p>
		</div>

		<div class="two columns">Issues</div>
		<div class="fourteen columns">
			<p class="caps">
				<a href="https://www.openrightsgroup.org/issues/gchq">Mass Surveillance</a> / <a href="https://www.openrightsgroup.org/issues/censorship">Censorship</a> / <a href="https://www.openrightsgroup.org/issues/copyright-reform">Copyright reform</a> /
				<a
				href="https://www.openrightsgroup.org/issues/data-protection">Data protection</a> / <a href="https://www.openrightsgroup.org/issues/opendata">Open Data</a> / <a href="https://www.openrightsgroup.org/issues/open-standards">Open Standards</a>
			</p>
		</div>


		<div class="two columns">Connect</div>
		<div class="fourteen columns connect">
			<a href="https://www.facebook.com/openrightsgroup">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_facebook.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://twitter.com/openrightsgroup">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_twitter.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://plus.google.com/u/0/116543318055985390327/posts">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_googleplus.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://www.flickr.com/photos/tags/openrightsgroup/">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_share.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://www.youtube.com/openrightsgroup">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_youtube.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://www.linkedin.com/groups/Open-Rights-Group-133233">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_linkedin.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://www.meetup.com/ORG-London/">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_red.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://www.openrightsgroup.org/feed/">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_rss.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://soundcloud.com/openrightsgroup">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_cloud.png" alt="" title="" width="30" height="29">
			</a>
			<a href="https://openrightsgroup.tumblr.com">
				<img src="https://www.openrightsgroup.org/assets/site/org/images/social_tumblr.png" alt="" title="Tumblr" width="30" height="29">
			</a>
		</div>

		<div class="sixteen columns right copyright">
			<p>© 2005 - 2016, free to reuse except where stated. <a href="/licence">Credits</a></p>
			<img src="https://www.openrightsgroup.org/assets/site/org/images/ccBadge.jpg" class="ccBadge">
		</div>


  </footer>
  </div>

  </div><!-- /#page -->
</div><!-- /#page-wrapper -->

<?php if($tabs && morelesszen_tabs_float()): ?>
  <div id="floating-tabs"><?php print render($tabs); ?></div>
<?php endif; ?>
