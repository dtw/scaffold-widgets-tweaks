# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.45.1] - 2024-04-17
### Changed
- add additional capabilities for moderator role

## [1.45] - 2024-04-17
### Added
- new moderator role

### Changed
- minor fixes

## [1.44] - 2023-10-31
### Added
- new options for Demographic Survey URL Tool to set source

### Changed
- UI and intructions for Demographic Survey URL Tool to make it more user-friendly

## [1.43.4] - 2023-10-04
### Fixed
- siteground-tweaks

## [1.43.3] - 2023-10-02
### Added
- support for Siteground Security plugin (sg-security) 2FA to custom roles

## [1.43.2] - 2023-09-28
### Removed
- many CSS rules to hw-feedback

## [1.43.1] - 2023-08-18
### Changed
- syntax changes to suppress PHP Notices

### Deleted
- CSS rules, moved to hw-feedback

## [1.43] - 2023-06-02
### Changed
- hard-code domain strings

## [1.42] - 2023-04-20
### Changed
- Featured Post widget now allows Scheduled ('future' status) posts. Logged in users will see a warning on widgets showing a scheduled post.
- Minor CSS changes

## [1.41.3] - 2023-02-17
### Changed
- styles for improved accessibility

## [1.41.2] - 2022-08-19
### Changed
- minor CSS tweaks and changes

## [1.41.1] - 2022-07-19
### Changed
- minor tweaks and changes

## [1.41.0] - 2022-06-24
### Added
- new_service callout shortcode - used when a new service begins at a previously registered location

### Changed
- fixed PHP contructors
- updated styles and colours in-line with Healthwatch England rebrand
- updated demographic survey handling

### Removed
- some widgets and shortcode moved to hw-feedback and hw-signposting
- some old and out-date widgets removed

## [1.40.0] - 2022-06-09
### Changed
- The Great Function Rename 2022 (renamed functions in line with plugin name)
- Demographic URL tool accessible to anyone
- URL in Demographic URL tool to _S
- try to hide some unneeded meta-boxes in admin

## [1.39.1] - 2022-05-11
### Changed
- fix references to --hw-grey

## [1.39.0] - 2022-05-11
### Added
- subscriber_plus role

## [1.38.0] - 2022-05-08
### Added
- add shortcode for [download_removed]

## [1.38.2] - 2022-04-08
### Added
- Demographic URL tool

## [1.37.1] - 2022-03-19
### Changed
- replace hex colours with var

## [1.37.0] - 2021-11-03
### Added
- CSS for NHS check column

## [1.36.0] - 2021-10-15
### Added
- add shortcode to embed SM surveys
- add download button format - in future, download links will not be auto-formatted.

## [1.35.0] - 2021-06-30
### Added
- [first_published] shortcode

## [1.34.0] - 2021-03-17
### Added
- Editor Plus custom role - an Editor than can alter current theme settings and use the customizer

### Changed
- increase number of recent posts shown in HW Bucks Featured Post config to 20 from 10

## [1.33.0] - 2021-01-20
### Added
- callout shortcode for "expired" page content [callout_expired]

### Changed
- minor tweaks to mailchimp form

## [1.32.0] - 2020-11-26
### Changed
- sticky post handling in 'latest post by category'
- minor PHP fixes

## [1.31.0] - 2020-09-08
### Added
- simple Facebook share shortcode [share_facebook] - doesn't require Facebook SDK

## [1.30.0] - 2020-06-18
### Added
- CSS class for thumbnails on 'featured post/page' widgets

### Changed
- Updates for PHP7.0 compatibility
- custom size in thumbnails with 'medium'

## [1.29.0] - 2020-04-28
### Added
- 'last modified date' shortcode - [last_updated]
- options to show button and show excerpt on 'featured post' widget
- option to display last update date and customise preceding text on 'featured post/page' widgets

## [1.28.0] - 2020-04-14
### Added
- coronavirus CSS style option to 'featured post/page' and 'latest post' widgets
- options to show button and show excerpt on 'latest post' and 'featured post' widgets
- a CSS class for the excerpt on most widgets

## [1.27.0] - 2020-04-07
### Changed
- site search shortcode name
- some shortcode names from callout_ to embed_ - this is distinguishes them from simple callouts
- CSS including support for new columns in Scaffold Child

### Removed
- old credits and broken links

## [1.26.1] - 2020-02-10
### Changed
- strip URLs from comments
- minor CSS changes

## [1.26.0] - 2020-01-28
### Added
- shortcode to display our reviews in pages

### Changed
- update multiple styles with altered colours to improve contrast based on WCAG2
- switched hex colour codes to colour names where possible (e.g. white)
- changes to validate HTML

## [1.25.0] - 2020-01-21
### Added
- new hover effects for widget subitems

### Changed
- screen reader hints for ratings added to all star ratings
- updated widget layouts with semantic classes and IDs
- support (accessible) anchor hover style

## [1.24.0] - 2020-01-10
### Changed
- change bootstrap columns in widgets based on orientation_check
- update to new feedbackstarrating() syntax

## [1.23.0] - 2020-01-06
### Changed
- fixed mobile layout in Three Column Image widget
- moved [childrenwithimages] shortcode from own file
- added a page_id argument to [childrenwithimages]

### Removed
- [childrenwithimages] widget file

## [1.22.2] - 2019-11-29
### Changed
- fixed images in Three Column Image widget

## [1.22.1] - 2019-11-11
### Changed
- fixed persistent bug in Recent Feedback widget
- hide some decorative icons with aria classes

## [1.22.0] - 2019-11-08
### Added
- function to check the orientation of an image in the media library. Returns "ls", "pt" or "sq" (landscape, portrait, square).

### Changed
- lots of changes to widget Panels for layout and image size
- Latest Post by Category widget now uses the orientation check to layout columns better

## [1.21.1] - 2019-11-07
### Changed
- minor syntax and CSS class updates

## [1.21.0] - 2019-11-01
### Changed
- use the new feedbackstarrating function() in DiC and Feedback widgets
- new fontawesome version classes

## [1.20.0] - 2019-10-31
### Added
- DiC widget. Replaces the static code on the front page.

## [1.19.0] - 2019-10-30
### Added
- Latest Posts by Category widget. Replaces the static "News" section on the front page. Can now be any category. Fetches the latest post and places in a Panel. Optionally shows the next 3 posts in a three column layout below the Panel.

### Changed
- comments on the Recent Feedback widget code
- removed the Panel title and made layout/logic changes on the Recent Feedback widget
- layout on the Three Column widget for mobile

## [1.18.0] - 2019-10-27
### Added
- Three Column Image widget. Provides a image-based CTA links in three columns. Takes title, excerpt and image. Includes JS to allow image selection from media library and refresh image previews in admin interface.

## [1.17.0] - 2019-10-24
### Added
- Three Column widget. Replaces the static "sub items" under the main panels on the home page. Takes a title, body text, url and button text.

## [1.16.0] - 2019-08-25
### Added
- Recent Feedback widget. Converts the Recent Feedback Panel on the front page into a widget.

## [1.15.0] - 2019-08-20
### Added
- Featured Post widget. Based on featured page but allows selection from 10 most recent posts.

## [1.14.0] - 2019-07-22
### Added
- four new shortcodes to embed a bootstrap tabs (not exactly sure how these work)

## [1.13.0] - 2019-07-18
### Added
- new shortcode to embed mailchimp signup form

### Changed
- CTA anchor format now applies to paragraph and anchor elements

## [1.12.0] - 2019-06-27
### Added
- new icon shortcode for sms

### Changed
- callout shortcode CSS styles
- allow title to be hidden in signpost_callout
- improve layout of widget-list-child-pages-with-featured-images
- rename alert callout to warning
- updated callout colors

## [1.11.0] - 2019-06-22
### Added
- new shortcode for signpost text
- new alert callout shortcode

### Removed
- old icon shortcodes (deprecated in 1.6.0)

## [1.10.0] - 2019-06-14
### Added
- js to scroll to the top of accordion panels when opened.

### Changed
- small CSS changes

## [1.9.0] - 2019-06-11
### Added
- new icon shortcode for signpost sms/text

## [1.8.0] - 2019-06-05
### Added
- media-object shortcodes for notes and question "callouts"
- a complex shortcode that fetches a signpost and displays it as a "card"

## [1.7.0] - 2019-06-03
### Added
- email and phone media-object shortcodes

### Changed
- cleaned up address, location and website media-object shortcodes

## [1.6.0] - 2019-05-30
### Changed
- replaced all icon shortcodes with new versions
- fixes on accordion panel edit link

## [1.5.0] - 2019-05-29
### Added
- an edit button to signpost accordion panels

### Changed
- featured-page-hwbucks now has a "read more" button rather than an anchor

## [1.4.0] - 2019-05-28
### Added
- new shortcodes for signpost website

### Changed
- signpost shortcodes can now use a single or opening/closings tags
- comments and clean-up

## [1.3.0] - 2019-05-22
### Added
- new shortcodes for signpost address and location: uses bootstrap media-object styles to prevent text wrapping around icon

## [1.2.0] - 2019-05-20
### Added
- new shortcodes to wrap an accordion and add basic accordion panels and panels that pull content from Post types

## [1.1.0] - 2019-05-17
### Added
- featured-page-hwbucks widget - allows the user to select any page to display in a panel.

## [1.0.0] - unknown
### Added
- The first version.
