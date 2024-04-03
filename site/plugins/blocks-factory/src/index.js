import Box from "./components/Box.vue";
import Statement from "./components/Statement.vue";
import VideoSelf from "./components/VideoSelf.vue";

panel.plugin("soapatrick/blocks-factory", {
  blocks: {
    box: Box,
    statement: Statement,
    "video-self": VideoSelf,
  },
});
