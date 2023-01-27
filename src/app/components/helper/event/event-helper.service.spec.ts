import { TestBed } from '@angular/core/testing';

import { EventHelperService } from './event-helper.service';

describe('EventHelperService', () => {
  let service: EventHelperService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(EventHelperService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
