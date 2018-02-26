# Twenty Percent Time Time

A fan-made project for a podcast that's "twenty minutes or less".

I analyze episode data from @twentypercentfm and display those stats at https://twentypercentti.me/

Soon, I'll have a twitter presence on [@twentypctbot](https://twitter.com/twentypctbot) that will give more stats on the podcast.

# Podcast

If you're not already a listener, subscribe to the Twenty Percent Time podcast here: http://twentypercent.fm/

# TODO

- [ ] Add more chart features (like point & axis labels, mouseover, etc)
- [ ] Add "last updated" timestamp somewhere on the page
- [ ] Figure out why some jobs are failing with `App\Jobs\ProcessFeed has been attempted too many times or run too long. The job may have previously timed out`. Might have something to do with queue listener settings in supervisord?
- [ ] There are probably more interesting metrics to add/replace the current four
- [ ] Refactor to use @tailwindcss
- [ ] Implement the twitter bot @twentypctbot to tweet...stuff (what stuff? 🤷‍♀️)
- [ ] Figure out how to get that dang footer to flex to the bottom of the page, no matter the size of the viewport
