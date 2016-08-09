<?php
/**
 * @file
 * Materialize theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
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
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */

foreach ($primary_nav as &$l) {
    if (!empty($l['#attributes'])) {
        $l['#attributes']['class'] = array('test');
    }
}

if (user_is_logged_in()) {
    global $user;
    $text = 'Logged in as ' . $user->name;
    $href = '/projects';
    $class = array('username', 'logged_in');

} else {
    $text = 'Login';
    $href = '/Shibboleth.sso/Login';
    $class = array('username', 'not_logged_in');
}
$primary_nav[1000] = array('#theme' => 'menu_link__main_menu', '#title' => $text, '#href' => $href, '#below' => '', '#attributes' => array('class' => $class));
$primary_nav[1001] = array('#theme' => 'menu_link__main_menu', '#title' => 'Search', '#href' => 'search', '#below' => '', '#attributes' => array('class' => 'search_button'));
?>



<nav class="top-nav bg-light-grey" id="nav">
    <ul id='slide-out' class='side-nav'>
        <li><div class="userView">
                <img class="background" src="/sites/default/files/abstract-background.jpg">
                <a href="#!user"><img class="circle" src="https://projects.nesi.org.nz/sites/default/files/nesi_avatar.png"></a>
                <a href="#!name"><span class="white-text name">John Doe</span></a>
                <a href="#!email"><span class="white-text email">jdandturk@gmail.com</span></a>
            </div></li>
        <li><a href="/"><i class="material-icons">home</i>Home</a></li>
        <li><a href="#!">Second Link</a></li>
        <li><a href="/"><i class="material-icons">library_books</i>Projects</a></li>
        <li><a class="subheader">Subheader</a></li>
<!--        <li><div class="divider"></div></li>-->

<!--        <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>-->
    </ul>

    <div class="nav-wrapper">
        <a href="#" data-activates="slide-out" class="button-collapse brand-logo show-on-large"><i class="material-icons" style="font-size: 24px;">menu</i></a>
        <a href="#" class="nav-left brand-logo">The Research Hub</a>

        <a class="waves-effect waves-circle btn-floating nav-user-btn white right dropdown-button" data-activates='user-details' data-beloworigin="true" data-constrainwidth="false">
            <?php
                if (user_is_logged_in()) {
                    $pictureUrl = $user->data['projectdb_info']->pictureUrl;

                    if($pictureUrl)
                        echo "<img src='{$pictureUrl}' class='circle'>";
                    else
                        echo "<img src='https://projects.nesi.org.nz/sites/default/files/nesi_avatar.png' class='circle'/>";
                } else {
                    echo "<img src='https://projects.nesi.org.nz/sites/default/files/nesi_avatar.png' class='circle'/>";
                };
            ?>
        </a>

        <ul id='user-details' class='dropdown-content collection' style="width: 300px;"> 
            <?php
                if (user_is_logged_in()) {
                    $pictureUrl = $user->data['projectdb_info']->pictureUrl;

                    if ($pictureUrl) {
                        echo "<li class='collection-item avatar'><img src='{$pictureUrl}' class='circle'><span class='title'>$user->name</span></li>";
                    }
                }
                else
                {
                    echo "<li class='collection-item avatar'><img src='https://projects.nesi.org.nz/sites/default/files/nesi_avatar.png' class='circle'/><span class='title'>Not logged in</span></li><li class='collection-item' href='Shibboleth.sso/Login'>Login</li>";
                }
            ?>
         </ul>
    </div>
</nav>

<nav class="secondary-header bg-white">
    <div class="nav-wrapper">
        <img class="uni-logo" src="/sites/default/files/logo.png">
        <ul id="nav-mobile" class="nav-container hide-on-med-and-down">
            <li><a class='nav-link' href='/#lifecycle'>Research Lifecycle</a></li>
            <li><a class='nav-link' href='/#category_accordion'>Service Types</a></li>
            <li><a class='nav-link' href='/#education'>Education</a></li>
            <li><a class='nav-link' href='/#guides'>Guides</a></li>
            <li><a class='nav-link' href='/#policies'>Policies</a></li>
        </ul>
    </div>
</nav>

<?php if (!empty($page['header'])): ?>
    <div class="top">
        <?php print render($page['header']); ?>
    </div>
<?php endif; ?>

<div class="row searchBox">
    <?php
    $form = drupal_get_form('search_block_form');
    print drupal_render($form); ?>
</div>

<?php if (user_is_logged_in()): ?>
    <input type='hidden' id='researchers' value='<?php
    $json = json_encode($user->data['researchers']);
    $json = str_replace("'", ' ', $json);
    echo $json;
    ?>'/>

    <div id="create_project" class="modal">
        <div class="modal-content">
            <h4>Create a new project</h4>
            <div class="row">
                <form class="col s12" method="POST" action="#">
                    <div class="row">
                        <ul class="collection">
                            <li class="collection-item avatar existing-collaborator">
                                <img src="<?php if (!empty($user->data['projectdb_info']->pictureUrl)) {
                                    echo $user->data['projectdb_info']->pictureUrl;
                                } else if (!empty($user->data['ldap_attributes']['thumbnailPhoto'])) {
                                    echo 'data:image/png;base64,' . $user->data['ldap_attributes']['thumbnailPhoto'];
                                }
                                ?>" alt="" class="circle">
                                <span class="title"><?php echo $user->data['ldap_attributes']['displayName'] ?></span>
                                <p style="font-weight:300">Project Owner</p>
                            </li>
                        </ul>
                        <div class="input-field col s12">
                            <input placeholder="Project Title" id="projectName" type="text" name="projectName"
                                   class="validate" required/>
                            <label for="projectName">Project title</label>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="projectDescription" name="projectDescription" class="materialize-textarea"
                                      required></textarea>
                            <label for="projectDescription">Project description</label>
                        </div>
                        <div class="input-field col s12">
                            <select id='scienceStudy' name="scienceStudy" required>
                                <?php
                                foreach ($user->data['science_domains'] as $d => $studies) {
                                    echo "<optgroup label='$d'>";
                                    foreach ($studies as $s) {
                                        $selected = '';
                                        if (!empty($user->data['ldap_attributes']['department']) && $s == $user->data['ldap_attributes']['department']) $selected = 'selected';
                                        echo "<option value='$s' $selected>$s</option>";
                                    }
                                    echo "</optgroup>";
                                }
                                ?>
                            </select>
                            <label for='scienceStudy'>Field of science</label>
                        </div>
                        <?php if (!empty($user->data['projectdb_info']->institutionalRoleId) && $user->data['projectdb_info']->institutionalRoleId != 1): ?>
                            <div class="input-field col s12">
                                <input type='hidden' id='supervisor-id' name='supervisor-id' required/>
                                <input placeholder="Supervisor" id="supervisor" name="supervisor" type="text"
                                       class="validate" autocomplete="off" required/>
                                <label for="supervisor">Supervisor's name</label>
                            </div>
                        <?php endif; ?>
                        <div class="input-field col s12">
                            <input type="date" class="datepicker" id="startDate" name="startDate" required/>
                            <label for="startDate">First day</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="date" class="datepicker" id="endDate" name="endDate" required/>
                            <label for="endDate">Last day</label>
                        </div>
                        Collaborators for this project:
                        <div class="input-field col s12">
                            <input placeholder="Collaborator" id="collaborator" type="text" class="validate"
                                   autocomplete="off"/>
                            <label for="collaborator">Name</label>
                        </div>
                        <div class="col s12 right">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div> <!-- row -->
                </form>
            </div> <!-- row -->
        </div> <!-- modal-content -->
    </div> <!-- modal-->

<?php endif; ?>

<div class="row page grid">
    <section class="<?php if (!empty($main_grid)) print $main_grid; ?> main" role="main" style="padding: 0;">
        <?php if (!empty($page['highlighted'])): ?>
            <div class="highlighted"><?php print render($page['highlight']); ?></div>
        <?php endif; ?>

        <?php print render($secondary_navigation); ?>

        <?php if (!empty($breadcrumb)): print $breadcrumb; endif; ?>
        <a id="main-content"></a>
        <?php print render($title_prefix); ?>
        <?php print render($title_suffix); ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs['#primary'])): ?>
            <?php print render($tabs_primary); ?>
        <?php endif; ?>

        <?php if (!empty($page['help'])): ?>
            <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
            <div class="action-links"><i class="mdi-action-note-add small"></i><?php print render($action_links); ?>
            </div>
        <?php endif; ?>
        <?php print render($tabs_secondary); ?>
        <?php if (drupal_is_front_page()) {
            unset($page['content']['system_main']['default_message']);
        }
        print render($page['content']); ?>
    </section>
</div>


<footer class="page-footer bg-dark-grey" style="padding: 0;margin: 0;">
    <div class="container">
        <div class="row">
            <div class="col l6 s12">
                <h5 class="white-text">Explore</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="#!">About the Centre for eResearch</a></li>
                </ul>
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Help & Support</h5>
                <ul>
                    <li><a class="grey-text text-lighten-3" href="http://www.eresearch.auckland.ac.nz/en/centre-for-eresearch/contact-us.html">Contact us</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">AskAuckland</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Donate to the Centre for eResearch</a></li>
                    <li><a class="grey-text text-lighten-3" href="#!">Provide feedback</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-copyright bg-darker-grey">
        <div class="container">
            © 2016 The Centre for eResearch
        </div>
    </div>
</footer>
