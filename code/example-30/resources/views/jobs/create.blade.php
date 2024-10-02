<x-layout>
    <x-page-heading>New Job</x-page-heading>

    <x-forms.form method="POST" action="/jobs">
        <x-forms.input name="title" label="Title" placeholder="CEO" />
        <x-forms.input name="Salary" label="salary" placeholder="$90,000 USD" />
        <x-forms.input name="Location" label="location" placeholder="Winter Park, Florida" />
        <x-forms.select label="Schedule" name="schedule">
            <option value="full-time">Full-time</option>
            <option value="part-time">Part-time</option>
        </x-forms.select>
        <x-forms.input name="url" label="URL" placeholder="https://acme.com/jobs/ceo-wanted" />
        <x-forms.checkbox name="featured" label="Featured (Extra Cost)" />
        <x-forms.divider />
        <x-forms.input name="tags" label="Tags (comma separated)" placeholder="music, video, education" />
        <x-forms.button>Publish</x-forms.button>
    </x-forms.form>
</x-layout>
