# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]
### Changed
- change bootstrap columns in widgets based on orientation_check

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
