panel.plugin("soapatrick/blocks-factory", {
  blocks: {
    box: {
      computed: {
        textField() {
          return this.field("text");
        },
      },
      template: `
        <div class="wrapper">
          <h5>Side Note:</h5>
          <k-writer
            class="text"
            ref="textbox"
            :marks="textField.marks"
            :value="content.text"
            :placeholder="textField.placeholder || 'Enter some stuff…'"
            @input="update({ text: $event })"
          />
        </div>
      `,
    },
    statement: {
      computed: {
        statementField() {
          return this.field("text");
        },
      },
      template: `
        <div class="wrapper">
          <k-writer
            class="text"
            ref="textbox"
            :marks="statementField.marks"
            :value="content.text"
            :placeholder="statementField.placeholder || 'Enter some stuff…'"
            @input="update({ text: $event })"
          />
        </div>
      `,
    },
    "video-self": {
      computed: {
        video() {
          return this.content.video[0] || {};
        },
      },
      template: `
        <figure class="wrapper" v-if="video.url">
          <video controls>
            <source :src="video.url" type="video/mp4">
          </video>
          <figcaption>{{ content.caption }}</figcaption>
        </figure>

        <figure v-else class="k-block-figure">
          <button type="button" class="k-button k-block-figure-empty" @click="open">
            <span aria-hidden="true" class="k-button-icon k-icon k-icon-video">
              <svg viewBox="0 0 16 16"><use xlink:href="#icon-video"></use></svg>
            </span>
            <span class="k-button-text"> Chose a video file … </span>
          </button>
        </figure>
      `,
    },
  },
});
