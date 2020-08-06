

import yolo, { downloadModel } from 'tfjs-yolo-tiny';

const model = await downloadModel();
const inputImage = webcam.capture();

const boxes = await yolo(inputImage, model);

// Display detected boxes
boxes.forEach(box => {
  const {
    top, left, bottom, right, classProb, className,
  } = box;

  drawRect(left, top, right-left, bottom-top, `${className} ${classProb}`)
});