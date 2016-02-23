
Alpha Starter Theme
===

Hi. I'm a starter theme called  `Alpha`, based `underscores`, but with some cool features! I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* Dashicon support enabled for front end use
* jQuery 1.10.2 enqueued from Google CDN
* Ready for FontAwesome. Linked to CDN
* HTML5 templates.
* A helpful 404 template.
* A sample custom header implementation in `inc/custom-header.php` that can be activated by uncommenting one line in `functions.php` and adding the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template tags in `inc/template-tags.php` that keep your templates clean and neat and prevent code duplication.
* Primary navigation toggles for mobile devices. Responsive menu.
* Structured with responsive grid inspired from Foundation 5
* Organized SASS files for easy organization while developing.
* Anchor links scroll to content (Thanks to code from Paulund)
* CSS Column Grid like those found in Genesis Framework (Thanks to Bill Erickson's generator)

* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

If you want to keep it simple, head over to http://underscores.me and generate your `_s` based theme from there. You just input the name of the theme you want to create, click the "Generate" button, and you get your ready-to-awesomize starter theme.

If you want to set things up manually, download `alpha` from GitHub. The first thing you want to do is copy the `_s` directory and change the name to something else (like, say, `megatherium`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'alpha'` (inside single quotations) to capture the text domain.
2. Search for `alpha_` to capture all the function names.
3. Search for `Text Domain: alpha` in style.css.
4. Search for <code>&nbsp;alpha</code> (with a space before it) to capture DocBlocks.
5. Search for `alpha-` to capture prefixed handles.

OR

* Search for: `'alpha'` and replace with: `'megatherium'`
* Search for: `alpha_` and replace with: `megatherium_`
* Search for: `Text Domain: alpha` and replace with: `Text Domain: megatherium` in style.css.
* Search for: <code>&nbsp;alpha</code> and replace with: <code>&nbsp;Megatherium</code>
* Search for: `alpha-` and replace with: `megatherium-`

Then, update the stylesheet header in `style.css` and the links in `footer.php` with your own information. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
